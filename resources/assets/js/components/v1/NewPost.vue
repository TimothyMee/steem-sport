<template>

    <div>

        <notifications />
        <div class="header-middle-area menu-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-12 col-xs-12 logo">
                        <a :href=homeRoute><!--<img src="images/logo.png" alt="logo">-->
                            <h5 style="color: #fbc02d">Steem-Sports</h5>
                        </a>
                    </div>
                    <div class="col-md-10 col-sm-12 col-xs-12 mobile-menu">
                        <div class="main-menu">
                            <a class="rs-menu-toggle"><i class="fa fa-bars"></i>Menu</a>
                            <nav class="rs-menu">
                                <ul class="nav-menu">
                                    <!-- Home -->
                                    <li>
                                        <a :href=homeRoute>Home</a>
                                    </li>
                                    <!-- End Home -->
                                    <li><a href="#">About</a></li>
                                    <li class="log" v-if="!login"><a href="#" @click="steemConnectLogin"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
                                    <li class="sign" v-if="!login"><a href="https://signup.steemit.com/"><span>/</span> Sign Up</a></li>
                                    <li class="sign" v-if="login"><a href="/new-post"><i class="fa fa-plus"></i> Add New Post </a></li>
                                    <li class="sign" v-if="login"><a href="https://signup.steemit.com/">{{user.username}}</a></li>
                                </ul>
                            </nav>
                            <!--Header Search Start  here-->
                            <!--<div class="search">
                                <a class="rs-search" data-target="#search-modal" data-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                            </div>-->
                            <!--Header Search End  here-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="preloader" v-if="!start">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!-- Breadcrumbs Section Start -->
        <div class="rs-breadcrumbs sec-color">
            <img src="/assets/v1/images/breadcrumbs/blog-left.jpg" alt="Breadcrubs-image"/>
            <div class="breadcrumbs-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1 class="page-title">New Post</h1>
                            <ul>
                                <li>
                                    <a class="active" href="/home">Post</a>
                                </li>
                                <li>New</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumbs Section End -->

        <!-- Home Blog Start Here -->
        <div id="rs-blog" class="rs-blog sec-spacer">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-ms-12">
                        <div class="row">
                            <h4>New Post</h4>

                            <input type="text" class="form-control" placeholder="Enter a title" v-model="title">
                            <br>

                            <markdown-editor preview-class = "markdown-body" v-model="postMarkdown"></markdown-editor>

                            <h6>Tags</h6>

                            <input type="text" class="form-control" placeholder="Separate tags with comma e.g Steem-sport, news" v-model="tags">

                            <br>
                            <button class="btn btn primary" @click.prevent="post()" style="float: left">Post</button>
                            <i v-if="loading"><img src="/assets/v1/images/blue_loading.gif" alt="" style="width:5%;"></i>
                            <br><br>
                            <h4>Preview:</h4>
                            <hr>
                            <p v-html="postPreview">

                            </p>
                            <br><br>
                            <hr>
                        </div>
                    </div>
<!--
                    <div class="col-md-3 col-sm-12" v-if="start">
                        &lt;!&ndash; Blog Single Sidebar Start Here &ndash;&gt;
                        <div class="sidebar-area">
                            <div class="recent-post-area">
                                <span class="title"> Recent Post</span>
                                <ul class="news-post">
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
                                                <div class="item-post">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 paddimg-right-none">
                                                            <img :src="newsData[1].previewImage" alt="" title="News image" />
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                            <h4><a href="#">{{newsData[1].title}}</a></h4>
                                                            <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i>{{moment(newsData[1].created).format("MMMM Do YYYY")}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
                                                <div class="item-post">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 paddimg-right-none">
                                                            <img :src="newsData[2].previewImage" alt="" title="News image" />
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                            <h4><a href="#">{{newsData[2].title}}</a></h4>
                                                            <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i>{{moment(newsData[2].created).format("MMMM Do YYYY")}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
                                                <div class="item-post">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 paddimg-right-none">
                                                            <img :src="newsData[3].previewImage" alt="" title="News image" />
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                            <h4><a href="#">{{newsData[3].title}}</a></h4>
                                                            <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i>{{moment(newsData[3].created).format("MMMM Do YYYY")}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="newsletter-area">
                                <h3>Newsletter</h3>
                                <p>Sign up for our Newsletter !</p>
                                <div class="box-newsletter">
                                    <input class="form-control" placeholder="youremail@domain.com" name="newsletter-term" id="newsletter-term" type="text">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
-->
                </div>
            </div>
        </div>
        <!-- Home Blog End Here -->
    </div>

</template>

<script>
    import 'simplemde/dist/simplemde.min.css' ;
    import 'github-markdown-css' ;
    export default {

        data(){
            return{
               newsData: {},
                start:false,
                pagination:1,
                currentNews: {
                   active_votes: 0,
                    replies:0,
                    active_comments:0,
                },
                homeRoute:'/home',
                api:{},
                login:false,
                user:{},
                loading:false,
                postMarkdown:'',
                tags:'',
                title:'',
                postPreview:'',
                modal:false,
                showComment : false,
            }
        },

        mounted() {
            this.getData();
            this.getUserExistingData();
        },

        watch:{
            postMarkdown: function(val){
                var converter = new showdown.Converter();

                this.postPreview = converter.makeHtml(val);
            },
        },

        methods:{
            getData(){
                this.start = false;
                    steem.api.getDiscussionsByTrending({"tag":"sport", "limit": "3"}, function(err, result) {

                        if (result){
                            this.arrangeData(result);
                        }
                    }.bind(this));
            },

            arrangeData(newsData){

                var currentNewsData = [];
                newsData.forEach(function (news){

                    news.active_comments = 0;

                    /*getting the comments*/
                    steem.api.getContentReplies(news.author, news.permlink, function(err, result) {
                        news.active_comments = result;
                    });

                    var converter = new showdown.Converter();
                    news.newBody = converter.makeHtml(news.body);

                    var metadata = JSON.parse(news.json_metadata);
                    if (metadata.image){
                        news.previewImage = metadata.image[0];
                    }

                    if (metadata.tags){
                        news.tag = metadata.tags[0];
                    }
                    else{
                        news.tag = "steem-sports";
                    }

                    if(this.login){
                        news.active_votes.forEach(function(votes){
                            if(votes.voter == this.user.username){
                                news.userHasVoted = true;
                            }
                        }.bind(this))
                    }

                }.bind(this));
                this.newsData = newsData;
//                console.log(this.newsData);
                this.start = true;
            },

            steemConnectLogin(){
                this.api = sc2.Initialize({
                    app: 'steem-sports.app',
                    callbackURL: 'http://localhost:8000/home',
                    accessToken: 'access_token',
                    scope: ['vote', 'comment']
                });

                var link = this.api.getLoginURL();
                window.location = link;

                this.SteemConnectAccessToken();
            },

            SteemConnectAccessToken(){

                var url = window.location.href;

                url = new URL(url);
                var accessToken = url.searchParams.get("access_token");
                var userName = url.searchParams.get("username");

                if (accessToken){
                    localStorage.setItem('username', userName);
                    localStorage.setItem('accessToken', accessToken);

                    this.api = sc2.Initialize({
                        app: 'steem-sports.app',
                        callbackURL: 'http://localhost:8000/home',
                        accessToken: accessToken,
                        scope: ['vote', 'comment']
                    });
                }
            },

            getUserExistingData(){

                this.user.username = localStorage.getItem('username');
                var accessToken = localStorage.getItem('accessToken');

                if (accessToken){
                    this.api = sc2.Initialize({
                        app: 'steem-sports.app',
                        callbackURL: 'http://localhost:8000/home',
                        accessToken: accessToken,
                        scope: ['vote', 'comment']
                    });

                    if(this.api){
                        this.login = true;
                    }
                    this.getData();
                }
            },

            post(){

                this.loading = true;

                this.api.me(function (err, res) {
//                    console.log(err, res);
                }.bind(this));

                this.api.setAccessToken(localStorage.getItem('accessToken'));

                var username = localStorage.getItem('username');
                var tagsArray = new Array();
                tagsArray = this.tags.split(",");

                var permlink = this.title.replace(/[^A-Z0-9]+/ig, "-").toLowerCase();
                var metadata = {
                    tags : tagsArray,
                    app : 'Steem-Sports/1.0',
                    community : 'Steem-Sports',
                }

                this.api.comment("", tagsArray[0],username, permlink, this.title,this.postMarkdown, metadata, function(err, result) {
                    console.log(err, result);

                    if(err){
                        this.$notify({type: 'error', text: '<span style="color: white">Couldn\'t Post now, <br> Try again later </span>', speed:400});
                    }

                    if (result){
                        this.loading = false;
                        this.$notify({type: 'success', text: 'You have Posted successfully', speed:400});
                    }

                }.bind(this));

            },

            showdownMethod(news){
                var converter = new showdown.Converter();
                return converter.makeHtml(news);
            }
        }
    }
</script>
