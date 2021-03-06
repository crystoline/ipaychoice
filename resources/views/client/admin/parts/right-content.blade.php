<div class="sb-content">
    <div class="user-info"><img src="{{ asset('client_assets/admin/img/avatar.jpg')}}"><span class="name">Samantha Amaretti<span class="status"></span></span><span class="position">Art Director</span></div>
    <div class="tab-navigation">
        <ul role="tablist" class="nav nav-tabs nav-justified">
            <li role="presentation" class="active"><a href="#tab1" aria-controls="home" role="tab" data-toggle="tab"> <span class="icon s7-smile"></span></a></li>
            <li role="presentation"><a href="#tab2" aria-controls="profile" role="tab" data-toggle="tab"> <span class="icon s7-chat"></span></a></li>
            <li role="presentation"><a href="#tab3" aria-controls="messages" role="tab" data-toggle="tab"> <span class="icon s7-help2"></span></a></li>
            <li role="presentation"><a href="#tab4" aria-controls="settings" role="tab" data-toggle="tab"> <span class="icon s7-ticket"></span></a></li>
        </ul>
    </div>
    <div class="tab-panel">
        <div class="tab-content">
            <div id="tab1" role="tabpanel" class="tab-pane announcement active am-scroller nano">
                <div class="nano-content">
                    <div class="content">
                        <h2>Announcement</h2>
                        <ul>
                            <li>
                                <div class="icon"><span class="icon s7-sun"></span></div>
                                <div class="content"><a href="#">Happy Day</a><span>Suspendisse nec leo tortor rhoncus tincidunt. Duis sit amet rutrum elit.</span></div>
                            </li>
                            <li>
                                <div class="icon"><span class="icon s7-gift"></span></div>
                                <div class="content"><a href="#">Congratulations Developers</a><span>Suspendisse nec leo tortor rhoncus tincidunt. Duis sit amet rutrum elit.</span></div>
                            </li>
                            <li>
                                <div class="icon"><span class="icon s7-star"></span></div>
                                <div class="content"><a href="#">High Score</a><span>Suspendisse nec leo tortor rhoncus tincidunt. Duis sit amet rutrum elit.</span></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="search">
                    <input type="text" placeholder="Search..." name="q"><span class="s7-search"></span>
                </div>
            </div>
            <div id="tab2" role="tabpanel" class="tab-pane chat">
                <div class="chat-contacts">
                    <div class="chat-sections">
                        <div class="am-scroller nano">
                            <div class="content nano-content">
                                <h2>Recent</h2>
                                <div class="recent">
                                    <div class="user"><a href="#"><img src="{{ asset('client_assets/admin/img/avatar4.jpg')}}">
                                            <div class="user-data"><span class="status away"></span><span class="name">Claire Sassu</span><span class="message">Can you share the...</span></div></a></div>
                                    <div class="user"><a href="#"><img src="{{ asset('client_assets/admin/img/avatar7.jpg')}}">
                                            <div class="user-data"><span class="status"></span><span class="name">Maggie jackson</span><span class="message">I confirmed the info.</span></div></a></div>
                                    <div class="user"><a href="#"><img src="{{ asset('client_assets/admin/img/avatar3.jpg')}}">
                                            <div class="user-data"><span class="status offline"></span><span class="name">Joel King		</span><span class="message">Ready for the meeti...</span></div></a></div>
                                </div>
                                <h2>Contacts</h2>
                                <div class="contact">
                                    <div class="user"><a href="#"><img src="{{ asset('client_assets/admin/img/avatar6.jpg')}}">
                                            <div class="user-data2"><span class="status"></span><span class="name">Mike Bolthort</span></div></a></div>
                                    <div class="user"><a href="#"><img src="{{ asset('client_assets/admin/img/avatar7.jpg')}}">
                                            <div class="user-data2"><span class="status"></span><span class="name">Maggie jackson</span></div></a></div>
                                    <div class="user"><a href="#"><img src="{{ asset('client_assets/admin/img/avatar8.jpg')}}">
                                            <div class="user-data2"><span class="status offline"></span><span class="name">Jhon Voltemar</span></div></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="search">
                        <input type="text" placeholder="Search..." name="q"><span class="s7-search"></span>
                    </div>
                </div>
                <div class="chat-window">
                    <div class="title">
                        <div class="user"><img src="{{ asset('client_assets/admin/img/avatar7.jpg')}}">
                            <h2>Maggie jackson</h2><span>Active 1h ago</span>
                        </div><span class="icon return s7-angle-left"></span>
                    </div>
                    <div class="chat-messages">
                        <div class="am-scroller nano">
                            <div class="content nano-content">
                                <ul>
                                    <li class="friend">
                                        <div class="msg">Hello</div>
                                    </li>
                                    <li class="self">
                                        <div class="msg">Hi, how are you?</div>
                                    </li>
                                    <li class="friend">
                                        <div class="msg">Good, I'll need support with my pc</div>
                                    </li>
                                    <li class="self">
                                        <div class="msg">Sure, just tell me what is going on with your computer?</div>
                                    </li>
                                    <li class="friend">
                                        <div class="msg">I don't know it just turns off suddenly</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="chat-input">
                        <div class="input-wrapper"><span class="photo s7-camera"></span>
                            <input type="text" placeholder="Message..." name="q" autocomplete="off"><span class="send-msg s7-paper-plane"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab3" role="tabpanel" class="tab-pane faqs am-scroller nano">
                <div class="nano-content">
                    <div class="content">
                        <h2>FAQs</h2>
                        <div id="accordion" role="tablist" aria-multiselectable="true" class="panel-group accordion">
                            <div class="panel">
                                <div role="tab" class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#faq1" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="icon"><span class="s7-angle-down"></span></div><span class="title">Under Error 352</span></a></h4>
                                </div>
                                <div id="faq1" role="tabpanel" aria-labelledby="headingOne" class="panel-collapse collapse in">
                                    <div class="panel-body">Suspendisse nec leo tortor rhoncus tincidunt. Duis sit amet rutrum elit.</div>
                                </div>
                            </div>
                            <div class="panel">
                                <div role="tab" class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#faq2" aria-expanded="false" aria-controls="collapseTwo" class="collapsed">
                                            <div class="icon"><span class="s7-angle-down"></span></div><span class="title">Failure platform</span></a></h4>
                                </div>
                                <div id="faq2" role="tabpanel" aria-labelledby="headingTwo" class="panel-collapse collapse">
                                    <div class="panel-body">Suspendisse nec leo tortor rhoncus tincidunt. Duis sit amet rutrum elit.</div>
                                </div>
                            </div>
                            <div class="panel">
                                <div role="tab" class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#faq3" aria-expanded="false" aria-controls="collapseThree" class="collapsed">
                                            <div class="icon"><span class="s7-angle-down"></span></div><span class="title">Error 404</span></a></h4>
                                </div>
                                <div id="faq3" role="tabpanel" aria-labelledby="headingThree" class="panel-collapse collapse">
                                    <div class="panel-body">Suspendisse nec leo tortor rhoncus tincidunt. Duis sit amet rutrum elit.</div>
                                </div>
                            </div>
                            <div class="panel">
                                <div role="tab" class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#faq4" aria-expanded="false" aria-controls="collapseThree" class="collapsed">
                                            <div class="icon"><span class="s7-angle-down"></span></div><span class="title">New workstation</span></a></h4>
                                </div>
                                <div id="faq4" role="tabpanel" aria-labelledby="headingThree" class="panel-collapse collapse">
                                    <div class="panel-body">Suspendisse nec leo tortor rhoncus tincidunt. Duis sit amet rutrum elit.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="search">
                    <input type="text" placeholder="Search..." name="q"><span class="s7-search"></span>
                </div>
            </div>
            <div id="tab4" role="tabpanel" class="tab-pane ticket am-scroller nano">
                <div class="nano-content">
                    <div class="content">
                        <h2>New Ticket</h2>
                        <form>
                            <div class="form-group send-ticket">
                                <input type="text" placeholder="Title" class="form-control">
                            </div>
                            <div class="form-group send-ticket">
                                <textarea rows="3" placeholder="Write Here..." class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">Create Ticket</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>