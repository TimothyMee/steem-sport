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
                                    <li class="sign" v-if="login"><a href="/profile">{{userData.user}}</a></li>
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
        <div class="rs-breadcrumbs sec-color" v-if="start">
            <img src="/assets/v1/images/breadcrumbs/blog-left.jpg" alt="Breadcrubs-image"/>
            <div class="breadcrumbs-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <span>
                                <img :src="userData.account_info.profile.profile_image" alt="" style="width:10%; border-radius:70%;">
                                <h2 class="page-title">{{userData.user}} <i style="font-size:50%;">({{userData.account_info.reputation}})</i></h2>
                            </span>
                            <h6 style="color:white">{{userData.account_info.profile.about}}</h6>
                            <span style="color:white">
                                <i class="fa fa-calendar"></i>&nbsp;{{moment(userData.account_info.created).format("MMMM Do YYYY")}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </span>

                            <span style="color:white">
                                Following: <span v-text="following"></span> | Followers: <span v-text="followers"></span> |
                                Posts: {{userData.account_info.postCount}}
                            </span>
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
                    <div class="col-md-9 col-ms-12" style="border-left:2px solid #fbc02d; border-right:2px solid #fbc02d">

                        <div class="row" v-if="loadingViews">
                            <p class="text-center">
                                <img src="/assets/v1/images/blue_loading.gif" alt="" style="width:40%">
                            </p>
                        </div>

                        <div v-if="showBlog" class="container">
                            <div>
                                <h4>My Blog</h4>
                            </div>

                            <div v-for="blog in userBlogHistory" style="margin-buttom:5px;" class="container row">
                                <div class="row">
                                    <h6>
                                        {{blog.root_author}} in {{blog.category}}&nbsp;&nbsp;
                                        <i class="fa fa-calendar"></i>&nbsp;{{moment(blog.created).format("MMMM Do YYYY")}}
                                    </h6>
                                </div>

                                <div class="row">
                                    <div style="float: left; width:15%;">
                                        <img :src="blog.previewImage" alt="">
                                    </div>

                                    <div class="container" style="float:left;">
                                        <br>
                                        <div class="container">
                                            <strong>{{blog.root_title}}</strong>
                                        </div>
                                        <div>
                                            <a href="#" v-if="login && blog.userHasVoted">
                                                <i class="fa fa-heart" style="color:red;"></i> {{blog.active_votes.length}} &nbsp;&nbsp;
                                            </a>

                                            <a href="#" v-if="login && !blog.userHasVoted" @click.prevent="upvote(blog)">
                                                <i class="fa fa-heart"></i> {{blog.active_votes.length}} &nbsp;&nbsp;
                                                <i v-if="voting"><img src="/assets/v1/images/blue_loading.gif" alt="" style="width:5%"></i>
                                            </a>

                                            <span v-if="!login"><i class="fa fa-heart"></i> {{blog.active_votes.length}} &nbsp;&nbsp;</span>

                                            <h6 v-if="blog.total_payout_value == '0.000 SBD'">
                                                <strong>${{blog.pending_payout_value}}</strong>
                                            </h6>

                                            <h6 v-else>
                                                <strong>${{blog.total_payout_value}}</strong>
                                            </h6>


                                            <a href="#" v-if="login"><i class="fa fa-comment"></i> {{blog.children}}</a>
                                            <span v-if="!login"><i class="fa fa-comment" v-if="!login"></i> {{blog.children}}</span>



                                            &nbsp;&nbsp;&nbsp;<a href="#" @click.prevent="showComment = !showComment" v-if="login">Comment</a>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                            </div>

                        </div>

                        <div v-if="showWallet" class="container">
                            <div>
                                <h4>My Wallet</h4>
                            </div>

                            <div style="margin-buttom:5px;" class="container">
                                <div class="row">
                                    <span>
                                        <h6 style="float:left">STEEM</h6><h6 style="float:right;">STEEM</h6>
                                    </span>

                                    <span>
                                        <p>
                                            Tradeable tokens that may be transferred anywhere at anytime.
                                            Steem can be converted to STEEM POWER in a process called powering up.
                                        </p>
                                    </span>
                                </div>

                                <div class="row">
                                    <span>
                                        <h6 style="float:left">STEEM POWER</h6><h6 style="float:right;">STEEM</h6>
                                    </span>

                                    <span>
                                        <p>
                                            Influence tokens which give you more control over post payouts and allow you to earn on curation rewards.
                                        </p>
                                    </span>
                                </div>

                                <div class="row">
                                    <span>
                                        <h6 style="float:left">STEEM DOLLARS</h6><h6 style="float:right;">STEEM</h6>
                                    </span>

                                    <span>
                                        <p>
                                            Tokens worth about $1.00 of STEEM, currently collecting 0% APR.
                                        </p>
                                    </span>
                                </div>

                                <div class="row">
                                    <span>
                                        <h6 style="float:left">SAVINGS</h6><h6 style="float:right;">STEEM</h6>
                                    </span>

                                    <span>
                                        <p>
                                            Balance subject to 3 day withdraw waiting period,STEEM DOLLARS currently collecting 0% APR.
                                        </p>
                                    </span>
                                </div>

                                <div class="row">
                                    <span>
                                        <h6 style="float:left">Estimated Account Value</h6><h6 style="float:right;">STEEM</h6>
                                    </span>

                                    <span>
                                        <p>
                                            The estimated value is based on an average value of Steem in US dollars.
                                        </p>
                                    </span>
                                </div>

                                <hr>
                            </div>
                        </div>

                        <div v-if="showSetting" class="container col-md-12">
                            <div>
                                <h4>Settings</h4>
                            </div>

                            <div class="container">
                                <div>
                                    Theme
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <!-- Blog Single Sidebar Start Here -->
                        <div class="sidebar-area">
                            <div class="cate-box">
                                <span class="title">Navs <span class="badge">Blog</span></span>
                                <ul>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        <a href="#" @click.prevent="getOwnerBlogHistory">Blog</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        <a href="#">Comments</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        <a href="#">Replies</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        <a href="#">Wallet</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        <a href="#">Settings</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

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
                userData: {
                    account_info:{
                        reputation : 0,
                        postCount : 0,
                        created : 0,
                        following : 0,
                        followers : 0,
                    }
                },
                start:false,
                followers:0,
                following:0,
                userBlogHistory:{},
                loadingViews:false,
                showBlog:false,
                login:false,
                voting:false,
                rewardBalance:'',
                recentClaims:'',
                steemPrice:'',





                pagination:1,
                currentNews: {
                    active_votes: 0,
                    replies:0,
                    active_comments:0,
                },
                homeRoute:'/home',
                api:{},
                user:{},
                postMarkdown:'',
                tags:'',
                title:'',
                postPreview:'',
                modal:false,
                showComment : false,
            }
        },

        watch:{
            following: function (val) {

            },

            followers: function(val) {

            }
        },

        mounted() {
            this.SteemConnectAccessToken();
           this.getProfileInfo();
        },

        methods:{

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

            getProfileInfo(){

                this.api = sc2.Initialize({
                    app: 'steem-sports.app',
                    callbackURL: 'http://localhost:8000/home',
                    accessToken: 'access_token',
                    scope: ['vote', 'comment']
                });

                this.api.setAccessToken(localStorage.getItem('accessToken'));

                if (localStorage.getItem('accessToken') && this.api){
                    this.login = true;
                }

                this.api.me(function (err, res) {
                    res.account_info = JSON.parse(res.account.json_metadata);

                    res.account_info.reputation =  steem.formatter.reputation(res.account.reputation);
                    res.account_info.postCount =  res.account.post_count;
                    res.account_info.created =  res.account.created;

                    steem.api.getFollowCount(res.name, function(err, result) {
                        this.following = result.following_count;
                        this.followers = result.follower_count;
                    }.bind(this));

                    this.userData = res;

                    console.log(this.userData);
                }.bind(this));


                if (this.userData){
                    this.start = true;
                }
            },


            getOwnerBlogHistory(){
                this.loading = true;

                var param = {
                    tag : this.userData.user,
                    limit : 50,
                }
                steem.api.getDiscussionsByBlog(param, function(err, result) {

                    result.forEach(function (res) {

                        /*formatting the image for display on the preview page*/
                        res.metadata = JSON.parse (res.json_metadata);
                        if (res.metadata.image){
                            res.previewImage = res.metadata.image[0];
                        }
                        else {
                            res.previewImage = false;
                        }

                        /*formatting the content for preview*/
                        var converter = new showdown.Converter();
                        res.newBody = converter.makeHtml(res.body);

                        res.previewBody = res.newBody.slice(0, 200);

//                        /*calculating payout*/
//                        steem.api.getRewardFund("post", function(err, rewardResult) {
//                            this.recentClaims = parseFloat(rewardResult.reward_balance.replace(" STEEM", ""));
//                            this.rewardBalance = rewardResult.recent_claims;
//                        }.bind(this));
//
//
//                        steem.api.getCurrentMedianHistoryPrice(function(err, Medianresult) {
//                            this.steemPrice = parseFloat(Medianresult.base.replace(" SBD", "")) / parseFloat(Medianresult.quote.replace(" STEEM", ""));
//                        }.bind(this));
//
//                        /*finishing up calculation*/
//                        var calculatedReward +=  (votes.rshares* this.rewardBalance / this.recentClaims * this.steemPrice).toFixed(3);


                        /*checking if current logged in user has voted*/
                        if(this.login){
                            res.active_votes.forEach(function(votes){
                                if(votes.voter == this.userData.user){
                                    res.userHasVoted = true;
                                }
                            }.bind(this))
                        }

                    }.bind(this));

                    this.userBlogHistory = result;
                    console.log(this.userBlogHistory);

                }.bind(this));

                if (this.userBlogHistory){
                    this.showBlog = true;
                    this.loadingViews = false;

                    console.log(this.userBlogHistory);
                }
            },

            getWalletInfo(){

            }
        }
    }
</script>
