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
                                    <li class="sign" v-if="login"><a href="/profile">{{user.username}}</a></li>
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
                            <h1 class="page-title">News</h1>
                            <ul>
                                <li>
                                    <a class="active" href="/home">Home</a>
                                </li>
                                <li>News</li>
                                <li>-- Page {{pagination}}</li>
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
                            <div class="col-md-4 col-sm-6 col-xs-6" v-for="news in newsData" v-if="start">
                                <div class="single-blog-slide" v-if="news.page == pagination">
                                    <div class="images">
                                        <a href="#" @click.prevent="openModal(news)" v-if="news.previewImage">
                                            <img :src="news.previewImage"
                                                 style="max-height:200px; width: 100%; height:200px;"
                                                 alt="Blog Image">
                                        </a>

                                        <a href="#" @click.prevent="openModal(news)" v-else>
                                            <img src="/assets/v1/images/video-bg.jpg"
                                                 style="max-height:200px; width: 100%; height:200px;"
                                                 alt="Blog Image">
                                        </a>
                                    </div>
                                    <div class="blog-details">
                                        <span class="date">
                                            <i class="fa fa-calendar-check-o"></i>
                                            {{moment(news.created).format("MMMM Do YYYY")}} &nbsp;&nbsp;

                                            <a href="#" v-if="login && news.userHasVoted">
                                                <i class="fa fa-heart" style="color:red;"></i> {{news.active_votes.length}} &nbsp;&nbsp;
                                            </a>

                                            <a href="#" v-if="login && !news.userHasVoted" @click.prevent="upvote(news)">
                                                <i class="fa fa-heart"></i> {{news.active_votes.length}} &nbsp;&nbsp; 
                                                <i v-if="loading"><img src="/assets/v1/images/blue_loading.gif" alt="" style="width:10%"></i>
                                            </a>

                                            <a href="#" v-if="login" @click.prevent="openModal(news)"><i class="fa fa-comment"></i> {{news.active_comments.length}}</a>

                                            <span v-if="!login"><i class="fa fa-heart"></i> {{news.active_votes.length}} &nbsp;&nbsp;</span>
                                            <span v-if="!login"><i class="fa fa-comment" v-if="!login"></i> {{news.active_comments.length}}</span>

                                        </span>
                                        <h3><a href="#" @click.prevent="openModal(news)">{{news.title}}</a></h3>

                                        <hr>
                                        <span><strong>${{news.pending_payout_value}}</strong></span>
                                        <hr>
                                        <div class="read-more">
                                            <a href="#" @click.prevent="openModal(news)">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="default-pagination text-center">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-angle-left"></i>Previous</a></li>
                                        <li class=""><a href="#" @click="paginate(1)">1</a></li>
                                        <li><a href="#" @click="paginate(2)">2</a></li>
                                        <li><a href="#" @click="paginate(3)">3</a></li>
                                        <li><a href="#" @click="paginate(4)">4</a></li>
                                        <li><a href="#" @click="paginate(5)">5</a></li>
                                        <li><a href="#">Next<i class="fa fa-angle-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <!-- Blog Single Sidebar Start Here -->
                        <div class="sidebar-area">
                            <!--<div class="search-box">
                                <div class="box-search">
                                    <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div>-->
                            <div class="cate-box">
                                <span class="title">Sort <span class="badge">{{sort}}</span></span>
                                <ul>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#" @click.prevent="sort = 'trending'">Trending</a>
                                    </li>

                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#" @click.prevent="sort = 'new'">New</a>
                                    </li>

                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#" @click.prevent="sort = 'hot'">Hot</a>
                                    </li>

                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#" @click.prevent="sort = 'promoted'">Promoted</a>
                                    </li>
                                </ul>
                            </div>

<!--
                            <div class="archives-box">
                                <span class="title">Categories <span class="badge">new</span></span>
                                <ul>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">Category Title 1</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">Category Title 2</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">Category Title 3</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">Category Title 4</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">Category Title 5></a>
                                    </li>
                                </ul>
                            </div>
-->

                            <div class="recent-post-area">
                                <span class="title"> Recent Post</span>
                                <ul class="news-post">
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
                                                <div class="item-post">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 paddimg-right-none">
                                                            <img :src="newsData[20].previewImage" alt="" title="News image" />
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                            <h4><a href="#">{{newsData[20].title}}</a></h4>
                                                            <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i>{{moment(newsData[20].created).format("MMMM Do YYYY")}}</span>
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
                                                            <img :src="newsData[40].previewImage" alt="" title="News image" />
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                            <h4><a href="#">{{newsData[40].title}}</a></h4>
                                                            <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i>{{moment(newsData[40].created).format("MMMM Do YYYY")}}</span>
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
                                                            <img :src="newsData[49].previewImage" alt="" title="News image" />
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                            <h4><a href="#">{{newsData[49].title}}</a></h4>
                                                            <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i>{{moment(newsData[49].created).format("MMMM Do YYYY")}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="tag-area">
                                <span class="title">Tags</span>
                                <ul>
                                    <li v-for="(news,index) in newsData" v-if="index < 10">
                                        <a href="#">{{news.tag}}</a>
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
                </div>
            </div>
        </div>
        <!-- Home Blog End Here -->

        <div class="container col-md-6 col-md-offset-3">
            <modal name="fullNews" :draggable="true" :scrollable="true" @before-open="beforeOpen" :adaptive="true" height="auto" width="70%">
                <button class="btn btn-danger btn-xs" @click="$modal.hide('fullNews')" style="float: right;"><span aria-hidden="true">&times;</span></button>
                <br>
                <span class="col-md-12" style="text-align: center; width: 80%; margin-left: 10%"><h2>{{currentNews.title}}</h2></span>

                <p v-html="currentNews.newBody" style="width: 80%; margin-left: 10%">

                </p>

                <div style="margin-left: 10%; width: 80%">
                    <hr>
                    <i class="fa fa-calendar-check-o"></i>
                    {{moment(currentNews.created).format("MMMM Do YYYY")}} &nbsp;&nbsp;

                    <a href="#" v-if="login && currentNews.userHasVoted">
                        <i class="fa fa-heart" style="color:red;"></i> {{currentNews.active_votes.length}} &nbsp;&nbsp;
                    </a>

                    <a href="#" v-if="login && !currentNews.userHasVoted" @click.prevent="upvote(currentNews)">
                        <i class="fa fa-heart"></i> {{currentNews.active_votes.length}} &nbsp;&nbsp;
                        <i v-if="loading"><img src="/assets/v1/images/blue_loading.gif" alt="" style="width:5%"></i>
                    </a>

                    <span v-if="!login"><i class="fa fa-heart"></i> {{currentNews.active_votes.length}} &nbsp;&nbsp;</span>


                    <h6><strong>${{currentNews.pending_payout_value}}</strong></h6>


                    <a href="#" v-if="login"><i class="fa fa-comment"></i> {{currentNews.active_comments.length}}</a>
                    <span v-if="!login"><i class="fa fa-comment" v-if="!login"></i> {{currentNews.active_comments.length}}</span>



                    &nbsp;&nbsp;&nbsp;<a href="#" @click.prevent="showComment = !showComment" v-if="login">Comment</a>
                    <hr>
                </div>

                <div style="margin-left: 10%; width: 80%">
                    <div v-if="showComment && login">
                        <h4>Reply (Comment)</h4>

                        <markdown-editor preview-class = "markdown-body" v-model="commentMarkdown"></markdown-editor>

                        <button class="btn btn primary" @click.prevent="comment(currentNews)" style="float: left">Comment</button>
                        <i v-if="loading"><img src="/assets/v1/images/blue_loading.gif" alt="" style="width:5%;"></i>
                        <br><br>
                        <h4>Preview:</h4>
                        <hr>
                        <p v-html="commentPreview">

                        </p>
                        <br><br>
                        <hr>
                    </div>

                    <div>
                        <h4>Comments</h4>
                        <hr>
                        <div v-for="comment in currentNews.active_comments">
                            <span>
                                <h6>
                                    <strong>{{comment.author}}</strong>&nbsp;&nbsp;
                                     <i class="fa fa-calendar-check-o"></i>
                                     {{moment(comment.created).format("MMMM Do YYYY")}}
                                </h6>
                            </span>

                            <span>
                                <h6 v-html="showdownMethod(comment.body)"></h6>
                            </span>

                            <span>
                                <a href="#" v-if="login" @click.prevent="upvote(comment)">
                                    <i class="fa fa-heart"></i> {{comment.active_votes.length}} &nbsp;&nbsp;
                                </a>
                                <span v-if="!login"><i class="fa fa-heart"></i> {{comment.active_votes.length}} &nbsp;&nbsp;</span>
                            </span>

                            <hr>
                        </div>
                    </div>
                </div>
            </modal>

        </div>

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
                commentMarkdown:'',
                commentPreview:'',
                modal:false,
                showComment : false,
                sort: 'trending'
            }
        },

        mounted() {
            this.SteemConnectAccessToken();
            this.getData();
            this.getUserExistingData();
        },

        watch:{
            commentMarkdown: function(val){
                var converter = new showdown.Converter();

                this.commentPreview = converter.makeHtml(val);
            },

            sort:function(val){
                this.getData();
            }
        },

        methods:{
            getData(){
                this.start = false;
                if(this.sort == 'trending'){
                    steem.api.getDiscussionsByTrending({"tag":"sport", "limit": "50"}, function(err, result) {

                        if (result){
                            this.arrangeData(result);
                        }
                    }.bind(this));
                }

                else if(this.sort == 'new'){
                    steem.api.getDiscussionsByCreated({"tag":"sport", "limit": "50"}, function(err, result) {

                        if (result){
                            this.arrangeData(result);
                        }
                    }.bind(this));
                }

                else if(this.sort == 'hot'){

                    steem.api.getDiscussionsByHot({"tag":"sport", "limit": "50"}, function(err, result) {
                        if (result){
                            this.arrangeData(result);
                        }
                    }.bind(this));
                }

                else if(this.sort == 'promoted'){
                    steem.api.getDiscussionsByPromoted({"tag":"sport", "limit": "3"}, function(err, result) {
                        if (result){
                            this.arrangeData(result);
                        }
                    }.bind(this));
                }
            },

            arrangeData(newsData){

                var i = 1;
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

                    if(i <= 10){
                        news.page = 1;
                    }
                    else if(i > 10 && i <= 20){
                        news.page = 2
                    }
                    else if(i > 20 && i <=30){
                        news.page = 3
                    }
                    else if(i >30 && i <= 40){
                        news.page = 4
                    }
                    else if(i > 40){
                        news.page = 5
                    }


                    if(this.login){
                        news.active_votes.forEach(function(votes){
                            if(votes.voter == this.user.username){
                                news.userHasVoted = true;
                            }
                        }.bind(this))
                    }

                    i++;
                }.bind(this));

                this.newsData = newsData;

                this.start = true;
            },

            paginate(page){
                this.pagination = page;
            },

            openModal(news){
               this.$modal.show('fullNews' ,news);
            },

            beforeOpen (event) {
                this.currentNews = event.params;
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
                        accessToken: "access_token",
                        scope: ['vote', 'comment']
                    });

                    this.api.setAccessToken(localStorage.getItem('accessToken'));

                    /*checking if user is still logged in */
                    this.api.me(function (err, res){
                        if (res){
                            this.login = true;
                        }
                    }.bind(this));

                    this.getData();
                }
            },

            upvote(news){
                this.loading = true;
                console.log(news);
                this.api.vote(this.user.username, news.author, news.permlink, 10000, function (err, res) {
                    if(err){
                        this.$notify({type: 'error', text: '<span style="color: white">Couldn\'t Upvote now, <br> Try again later </span>', speed:400});
                    }
                    if(res){
                        this.loading = false;
                        this.$notify({type: 'success', text: 'successfully upvoted', speed:400});
                        news.userHasVoted = true;
                    }
                }.bind(this));
            },

            comment(news){

                this.loading = true;

                this.api.me(function (err, res) {
//                    console.log(err, res);
                }.bind(this));

                this.api.setAccessToken(localStorage.getItem('accessToken'));

                var username = localStorage.getItem('username');
                var commentPermlink = steem.formatter.commentPermlink(news.author, news.permlink);

                this.api.comment(news.author, news.permlink,username, commentPermlink, '',this.commentMarkdown, '', function(err, result) {
                    console.log(err, result);

                    if(err){
                        this.$notify({type: 'error', text: '<span style="color: white">Couldn\'t Comment now, <br> Try again later </span>', speed:400});
                    }

                    if (result){
                        this.loading = false;
                        this.$notify({type: 'success', text: 'Comment was posted successfully', speed:400});
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
