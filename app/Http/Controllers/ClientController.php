<?php

namespace App\Http\Controllers;

//use Classes\xmlapi;
use App\Models\Client;
use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    //
    public function create(){
        return view('pages.client-create');
    }
    public function store(Request $request){
        $this->validate($request, self::$rules);
        $validator = Validator::make($request->all(),self::$rules);

        if ($validator->fails()) {
            return redirect()->route('user.client.create')
                ->withErrors($validator)
                ->withInput();
        }
        //dd('hello');
        $client = new Client();
        $client->name = $request->input('name');
        $client->address = $request->input('address')? :'';
        $client->user_id = Auth()->user()->id;


        $client->save();
        $config = new Configuration();
        $config->client_id = $client->id;
        $config->subdomain = $request->input('sub_domain');
        $config->domain = $request->input('sub_domain').'.'.env('APP_DOMAIN');
        $config->database = 'clients_'.$client->id;
        $config->save();

        $config = self::setupDb($config) ;
        if(!$config){
            return redirect()->route('user.client.create')
                ->withInput();
        }else{
            $config->save();
        }


        self::setDb($config->database);
        $mig_data = self::runMigration();



        /** Testing */
        /*Configuration::destroy($config->id);
        Client::destroy($client->id);
        dd($mig_data);*/
        return redirect()->route('user.client.dashboard', ['client' => $client->id]);
    }

    public function edit(Request $request, Client $client){
        return view('pages.client-edit')->with(['client'=>$client]);
    }

    public function update(Request $request, Client $client){
        $this->validate($request, self::$rules);

        $client->name = $request->input('name');
        $client->address = $request->input('address');
        $client->save();

        return redirect()->action('HomeController@index');
    }
    protected static $rules = [
        'name' => 'required',
        'sub_domain' => 'required|unique:configurations,subdomain',
        //'eamil' => 'required'
    ];

    private static function setupDb(Configuration $configuration){
        $result = 0;
        if(env('APP_ENV', 'local') ==  'local'){

            $result = DB::getSchemaBuilder()
                ->getConnection()
                ->statement("CREATE DATABASE IF NOT EXISTS ".$configuration->database)? 1:0;

        }
        else{//use CPanel API

            $ip                 = env('SERVER_IP','162.144.67.19');
            $account            = env('SERVER_USER','upltest' );//config('school.server.account','upltest');
            $password           = env('SERVER_PASS','+f4^1F-D&amp;u1MO8RILC' );// config('school.server.password','+f4^1F-D&amp;u1MO8RILC');
            $db_pre             = env('SERVER_PREFIX', 'upltest_'); //config('school.database.prefix','upltest_');
            //db_user created on cpanel
            $db_user = config('database.connections.mysql_client.username');

            $xmlapi             = new xmlapi($ip);
            $xmlapi->set_port(2083); //set connection port
            $xmlapi->password_auth($account,$password); //authenticate user

            $debug = (env('APP_ENV', 'local') ==  'local')? 1:0; //determine local environment
            $xmlapi->set_debug($debug);

            $xmlapi->set_output('json'); //or json, xml, or simplexml

            $db_created = 0;
            //$db_user_permission = 0;

            //create database
            $configuration->database = $db_name = $db_pre.$configuration->database;
            $response = self::xmlApiCreateDb($xmlapi, $account,$db_name);

            if(@$response['cpanelresult']['event']['result'] == 1) $db_created = 1;
            elseif(strpos(@$response['cpanelresult']['event']['reason'], 'already exists'))$db_created = 1;


            //add user-database-privilege
            if($db_created){
                $response =  self::xmlApiSetDbUserPrivileges($xmlapi, $account, $db_name, $db_user);

                //dd($response);
                if(@$response['cpanelresult']['event']['result'] == 1 )$result = 1;//return $configuration;
            }

        }
        return $result? $configuration: 0;
    }
    public static function runMigration()
    {
        //$list_accounts = CpanelWhm::listaccts();
        //Run initial migration
        Artisan::call('migrate', [
            '--database' => 'mysql_client',
            '--path' => 'database/migrations/clients',
            '--force' => true
        ]);
         Artisan::call('db:seed', [
             '--database' => 'mysql_client',
             '--force' => true,
             '--class' => 'Clients'
         ]);

    }
    public static function setDb($db_name)
    {
        //set database name for mysql-portal connection for the duration of this request
        Config::set('database.connections.mysql_client.database', $db_name);
        //laravel requires a connection for the db in validator's confirmation function
        //Config::set('database.connections.'.$db_name, config('database.connections.mysql_client'));
    }

    /**
     * Create Database on Hosting Account
     * @param xmlapi $xmlapi An xmlapi instance with all requirements set
     * @param $account CPanal account/username
     * @param $db_name Database name
     * @return Object
     */
    private static function xmlApiCreateDb(xmlapi $xmlapi, $account, $db_name)
    {
        $response = $xmlapi->api2_query($account, 'MysqlFE', 'createdb', ['db' => $db_name] );
        $response = json_decode($response, true);
        return $response;
    }

    /**
     * Create database User on a Cpanel account
     * @param xmlapi $xmlapi An xmlapi instance with all requirements set
     * @param $account CPanal account/username
     * @param $db_user
     * @param $password
     * @return mixed
     */
    private static function xmlApiCreateDbUser(xmlapi $xmlapi, $account, $db_user, $password)
    {
        $response = $xmlapi->api2_query($account, 'MysqlFE', 'createdbuser', [
            'dbuser'   => $db_user,
            'password' => $password
        ] );
        $response = json_decode($response, true);
        return $response;
    }

    /**
     * Add Assign privileges to User on a Database
     * @param xmlapi $xmlapi An xmlapi instance with all requirements set
     * @param $account CPanal account/username
     * @param $db_name
     * @param $db_user
     * @param string $privileges
     * @return mixed
     */
    private static function xmlApiSetDbUserPrivileges(xmlapi $xmlapi, $account, $db_name, $db_user, $privileges= 'ALL PRIVILEGES')
    {
        $response = $xmlapi->api2_query($account, 'MysqlFE', 'setdbuserprivileges', [
            'privileges' => $privileges,
            'db' => $db_name,
            'dbuser' => $db_user,
        ]);

        $response = json_decode($response,true);
        return $response;
    }
}
