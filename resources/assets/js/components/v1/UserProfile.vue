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

                        <div class="row" v-if="loading == true">
                            <div class="container">
                                <div class="col-md-9 col-sm-12 col-xs-12">
                                    <span class="col-md-3 col-md-offset-4">
                                        <img src="/assets/v1/images/loading_dots.gif" alt="" style="width:100%">
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row" v-if="loading == false">
                            <div v-if="showBlog" class="container">
                                <h4>My Blog</h4>
                                <div class="col-md-9 col-sm-12 col-xs-12" v-for="blog in userBlogHistory">
                                    <hr>
                                    <div class="text">
                                        <h6>
                                            <span class="fa fa-dot-circle-o" v-if="blog.author == userData.name">&nbsp; {{blog.root_author}} in {{blog.category}}&nbsp;&nbsp;</span>
                                            <i class="fa fa-retweet" v-if="blog.author != userData.name">&nbsp; {{blog.root_author}} in {{blog.category}}&nbsp;&nbsp;</i>
                                            <i class="fa fa-calendar"></i>&nbsp;{{moment(blog.created).format("MMMM Do YYYY")}}
                                        </h6>
                                    </div>

                                    <div class="text" @click.prevent="">
                                        <div class="col-md-3" v-if="blog.previewImage">
                                            <a href="#" @click.prevent="openModal(blog)">
                                                <img :src="blog.previewImage" alt="">
                                            </a>
                                        </div>

                                        <div class="col-md-6" style="margin-left:10px;">
                                            <h5><strong><a href="#" @click.prevent="openModal(blog)">{{blog.root_title}}</a></strong></h5>
                                            <div>
                                                <a href="#" v-if="login && blog.userHasVoted" style="float: left; margin-left:2%;">
                                                    <i class="fa fa-heart" style="color:red;"></i> {{blog.active_votes.length}} &nbsp;&nbsp;
                                                </a>

                                                <a href="#" v-if="login && !blog.userHasVoted" @click.prevent="upvote(blog)" style="float: left; margin-left:2%;">
                                                    <i class="fa fa-heart"></i> {{blog.active_votes.length}} &nbsp;&nbsp;
                                                    <i v-if="upvotingLoader"><img src="/assets/v1/images/blue_loading.gif" alt="" style="width:5%"></i>
                                                </a>

                                                <a v-if="!login" style="float: left; margin-left:2%;"><i class="fa fa-heart"></i> {{blog.active_votes.length}} &nbsp;&nbsp;</a>

                                                <p v-if="blog.total_payout_value == '0.000 SBD'" style="float: left; margin-left:2%;">
                                                    <strong>${{blog.pending_payout_value}}</strong>
                                                </p>

                                                <p v-else style="float: left; margin-left:2%;">
                                                    <strong>${{blog.total_payout_value}}</strong>
                                                </p>


                                                <a href="#" v-if="login" style="float: left; margin-left:2%;"><i class="fa fa-comment"></i> {{blog.active_comments.length}}</a>
                                                <span v-if="!login" style="float: left; margin-left:2%;"><i class="fa fa-comment" v-if="!login"></i> {{blog.active_comments.length}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-if="showWallet" class="container">
                                <h4>My Wallet</h4>
                                <div class="col-md-9 col-sm-12 col-xs-12">

                                    <div class="text" v-if="userData.account.reward_sbd_balance || userData.account.reward_steem_balance || userData.account.reward_vesting_steem">
                                        <hr>
                                        <p style="box-shadow:2px 2px 2px black; border:1px solid black">
                                            You have
                                            <span v-if="userData.account.reward_sbd_balance !=  '0.000 SBD'">{{userData.account.reward_sbd_balance}},</span>
                                            <span v-if="userData.account.reward_steem_balance !=  '0.000 STEEM'">{{userData.account.reward_steem_balance}},</span>
                                            <span v-if="userData.account.reward_vesting_steem !=  '0.000 STEEM'">{{userData.account.reward_vesting_steem}}</span>
                                            to claim
                                        </p>
                                    </div>

                                    <hr>

                                    <div class="text">
                                        <div class="" style="margin-left:10px;">
                                            <p><strong style="size:5%">STEEM <span style="float: right">{{userData.account.balance}}</span></strong></p>
                                            <p>Tradeable tokens that may be transferred anywhere at anytime.<br>
                                                Steem can be converted to STEEM POWER in a process called powering up.</p>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="text">
                                        <div class="" style="margin-left:10px;">
                                            <p><strong style="size:5%">STEEM DOLLARS<span style="float: right">{{userData.account.sbd_balance}}</span></strong></p>
                                            <p>Tokens worth about $1.00 of STEEM, currently collecting 0% APR.</p>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="text">
                                        <div class="" style="margin-left:10px;">
                                            <p><strong style="size:5%">STEEM POWER<span style="float: right">{{userData.account.steemPower}}</span></strong></p>
                                            <p>Influence tokens which give you more control over post payouts and allow you to earn on curation rewards.</p>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="text">
                                        <div class="" style="margin-left:10px;">
                                            <p><strong style="size:5%">SAVINGS<span style="float: right">{{userData.account.savings_balance}}</span></strong></p>
                                            <p>Balance subject to 3 day withdraw waiting period,STEEM DOLLARS currently collecting 0% APR.</p>
                                        </div>
                                    </div>

                                    <hr>

                                    <br>
                                    <br>
                                    <h4>Wallet history</h4>
                                    <div class="table">
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                                <tr v-for="transfer_history in transferHistory">
                                                    <td class="text-center">
                                                        Transfer of {{transfer_history[1].op[1].amount}}
                                                        from {{transfer_history[1].op[1].from}}
                                                        to {{transfer_history[1].op[1].to}}
                                                    </td>

                                                    <td class="text-center">
                                                        {{transfer_history[1].op[1].memo}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div v-if="showComments" class="container">
                                <h4>My Comments</h4>
                                <div class="col-md-9 col-sm-12 col-xs-12" v-for="comment in userCommentHistory">
                                    <hr>
                                    <div class="text">
                                        <h6>
                                            <span class="fa fa-dot-circle-o">&nbsp; {{comment.root_author}} in {{comment.category}}&nbsp;&nbsp;</span>
                                            <i class="fa fa-calendar"></i>&nbsp;{{moment(comment.created).format("MMMM Do YYYY")}}
                                        </h6>
                                    </div>

                                    <div class="text" @click.prevent="">
                                        <div class="col-md-12" style="margin-left:10px;">
                                            <h5><strong>RE: {{comment.root_title}}</strong></h5>
                                            <div>
                                                <!--the body-->
                                                <span v-html="comment.newBody">

                                                </span>


                                                <a href="#" v-if="login && comment.userHasVoted" style="float: left; margin-left:2%;">
                                                    <i class="fa fa-heart" style="color:red;"></i> {{comment.active_votes.length}} &nbsp;&nbsp;
                                                </a>

                                                <a href="#" v-if="login && !comment.userHasVoted" @click.prevent="upvote(comment)" style="float: left; margin-left:2%;">
                                                    <i class="fa fa-heart"></i> {{comment.active_votes.length}} &nbsp;&nbsp;
                                                    <i v-if="upvotingLoader"><img src="/assets/v1/images/blue_loading.gif" alt="" style="width:5%"></i>
                                                </a>

                                                <a v-if="!login" style="float: left; margin-left:2%;"><i class="fa fa-heart"></i> {{comment.active_votes.length}} &nbsp;&nbsp;</a>

                                                <p v-if="comment.total_payout_value == '0.000 SBD'" style="float: left; margin-left:2%;">
                                                    <strong>${{comment.pending_payout_value}}</strong>
                                                </p>

                                                <p v-else style="float: left; margin-left:2%;">
                                                    <strong>${{comment.total_payout_value}}</strong>
                                                </p>


                                                <a href="#" v-if="login" style="float: left; margin-left:2%;"><i class="fa fa-comment"></i> {{comment.children}}</a>
                                                <span v-if="!login" style="float: left; margin-left:2%;"><i class="fa fa-comment" v-if="!login"></i> {{comment.children}}</span>
                                            </div>
                                        </div>
                                    </div>
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
                                        <a href="#" @click.prevent="getOwnerCommentHistory">Comments</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        <a href="#" @click.prevent="getOwnerWalletHistory">Wallet</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Home Blog End Here -->

        <!--Modal-->
        <div class="container col-md-6 col-md-offset-3">
            <modal name="fullStory" :draggable="true" :scrollable="true" @before-open="beforeOpen" :adaptive="true" height="auto" width="70%">
                <button class="btn btn-danger btn-xs" @click="$modal.hide('fullStory')" style="float: right;"><span aria-hidden="true">&times;</span></button>
                <br>
                <span class="col-md-12" style="text-align: center; width: 80%; margin-left: 10%"><h2>{{currentStory.title}}</h2></span>

                <p v-html="currentStory.newBody" style="width: 80%; margin-left: 10%">

                </p>

                <div style="margin-left: 10%; width: 80%">
                    <hr>
                    <i class="fa fa-calendar-check-o"></i>
                    {{moment(currentStory.created).format("MMMM Do YYYY")}} &nbsp;&nbsp;

                    <a href="#" v-if="login && currentStory.userHasVoted">
                        <i class="fa fa-heart" style="color:red;"></i> {{currentStory.active_votes.length}} &nbsp;&nbsp;
                    </a>

                    <a href="#" v-if="login && !currentStory.userHasVoted" @click.prevent="upvote(currentNews)">
                        <i class="fa fa-heart"></i> {{currentStory.active_votes.length}} &nbsp;&nbsp;
                        <i v-if="upvotingLoader"><img src="/assets/v1/images/blue_loading.gif" alt="" style="width:5%"></i>
                    </a>

                    <span v-if="!login"><i class="fa fa-heart"></i> {{currentStory.active_votes.length}} &nbsp;&nbsp;</span>


                    <h6 v-if="currentStory.total_payout_value == '0.000 SBD'">
                        <strong>${{currentStory.pending_payout_value}}</strong>
                    </h6>

                    <h6 v-else>
                        <strong>${{currentStory.total_payout_value}}</strong>
                    </h6>


                    <a href="#" v-if="login"><i class="fa fa-comment"></i> {{currentStory.active_comments.length}}</a>
                    <span v-if="!login"><i class="fa fa-comment" v-if="!login"></i> {{currentStory.active_comments.length}}</span>



                    &nbsp;&nbsp;&nbsp;<a href="#" @click.prevent="showComment = !showComment" v-if="login">Comment</a>
                    <hr>
                </div>

                <div style="margin-left: 10%; width: 80%">
                    <div v-if="showComment && login">
                        <h4>Reply (Comment)</h4>

                        <markdown-editor preview-class="markdown-body" v-model="commentMarkdown"></markdown-editor>

                        <button class="btn btn primary" @click.prevent="comment(currentStory)" style="float: left">Comment</button>
                        <i v-if="commentLoader"><img src="/assets/v1/images/blue_loading.gif" alt="" style="width:5%;"></i>
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
                        <div v-for="comment in currentStory.active_comments">
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

                                <!--&nbsp;&nbsp;&nbsp;<a href="#" @click.prevent="showReplyComment = !showReplyComment" v-if="login">Comment</a>-->
                            </span>

                            <!--<div style="margin-left: 20%; width: 80%;" v-if="showReplyComment && login">
                                <markdown-editor preview-class = "markdown-body" v-model="commentMarkdown"></markdown-editor>
                                <button class="btn btn primary" @click.prevent="comment(comment)" style="float: left">Comment</button>
                                <i v-if="commentLoader"><img src="/assets/v1/images/blue_loading.gif" alt="" style="width:5%;"></i>
                            </div>-->
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
                userData: {
                    account_info:{
                        reputation : 0,
                        postCount : 0,
                        created : 0,
                        following : 0,
                        followers : 0,
                    },

                    account:{
                        steemPower: 0,
                        estimated_account_value: 0,
                    }
                },
                start:false,
                followers:0,
                following:0,
                userBlogHistory:{},
                userCommentHistory:{},
                loadingViews:false,
                loading:false,
                upvotingLoader:false,
                commentLoader:false,
                showBlog:false,
                showWallet:false,
                showComments:false,
                login:false,
                rewardBalance:'',
                recentClaims:'',
                steemPrice:'',
                totalVesting:{},
                transferHistory:{},
                currentStory: {
                    active_votes: 0,
                    replies:0,
                    active_comments:0,
                },
                commentMarkdown:'',
                showComment : false,
                showReplyComment:false,







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
            this.getCurrentVestingShares();
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

                    if (res){
                        this.getOwnerBlogHistory();
                    }
                }.bind(this));


                if (this.userData){
                    this.start = true;
                }
            },


            getOwnerBlogHistory(){
                this.loading = true;
                this.showWallet = false;
                this.showComments = false;

                var param = {
                    tag: this.userData.user,
                    limit: 50,
                }
                steem.api.getDiscussionsByBlog(param, function (err, result) {

                    result.forEach(function (res) {

                        /*formatting the image for display on the preview page*/
                        res.metadata = JSON.parse(res.json_metadata);
                        if (res.metadata.image) {
                            res.previewImage = res.metadata.image[0];
                        }
                        else {
                            res.previewImage = false;
                        }

                        /*formatting the content for preview*/
                        var converter = new showdown.Converter();
                        res.newBody = converter.makeHtml(res.body);

                        res.previewBody = res.newBody.slice(0, 200);

                        /*fetching the comments on each story*/
                        res.active_comments = 0;
                        steem.api.getContentReplies(res.author, res.permlink, function (err, result) {
                            res.active_comments = result;
                        });

                        /*checking if current logged in user has voted*/
                        if (this.login) {
                            res.active_votes.forEach(function (votes) {
                                if (votes.voter == this.userData.user) {
                                    res.userHasVoted = true;
                                }
                            }.bind(this))
                        }

                    }.bind(this));

                    this.userBlogHistory = result;

                    if (this.userBlogHistory.length > 0) {
                        this.showBlog = true;
                        this.loading = false;
                    }

                }.bind(this));
            },

            getOwnerCommentHistory(){
                this.loading = true;
                this.showWallet = false;
                this.showBlog = false;
                steem.api.getDiscussionsByComments({"start_author":this.userData.name, "limit": "50"}, function(err, result) {

                    result.forEach(function (res) {
                        var converter = new showdown.Converter();
                        res.newBody = converter.makeHtml(res.body);
                    });

                    this.userCommentHistory = result;
                    console.log(this.userCommentHistory);
                    this.loading = false;
                    this.showComments = true;
                }.bind(this));
            },

            getOwnerWalletHistory(){
                this.loading = true;
                this.showBlog = false;
                this.showComments = false;

                /*parsing the strings to float*/
                this.userData.account.vesting_shares = parseFloat(this.userData.account.vesting_shares);

                /*getting the  account transfer history*/
                this.getTransferHistory();

                /*calculating the account steem-power and estimated account value*/
                if (this.totalVesting.shares) {
                    this.getSteemPower();
                }
            },

            getCurrentVestingShares(){
                /*getting the current vesting shares*/
                steem.api.getDynamicGlobalProperties(function (err, result) {

                    this.totalVesting.shares = parseFloat(result.total_vesting_shares);
                    this.totalVesting.fundSteem = parseFloat(result.total_vesting_fund_steem);
                }.bind(this));
            },

            getTransferHistory(){
                /*getting the transfer history*/
                steem.api.getAccountHistory(this.userData.name, -1, 500,function(err, result) {
                    let transfers = result.filter( tx => tx[1].op[0] === 'transfer')
                    this.transferHistory =  transfers;
                    console.log(this.transferHistory);
                }.bind(this));
            },

            getSteemPower(){
                /*calculating steem power*/
                this.userData.account.steemPower = steem.formatter.vestToSteem(this.userData.account.vesting_shares, this.totalVesting.shares, this.totalVesting.fundSteem).toFixed(3);
                this.loading = false;
                this.showWallet = true;
            },

            upvote(news){
                this.upvotingLoader = true;
                this.api.vote(this.userData.name, news.author, news.permlink, 10000, function (err, res) {
                    if(err){
                        this.$notify({type: 'error', text: '<span style="color: white">Couldn\'t Upvote now, <br> Try again later </span>', speed:400});
                    }
                    if(res){
                        this.upvotingLoader = false;
                        this.$notify({type: 'success', text: 'successfully upvoted', speed:400});
                        news.userHasVoted = true;
                    }
                }.bind(this));
            },

            openModal(news){
                this.$modal.show('fullStory' ,news);
            },

            beforeOpen (event) {
                this.currentStory = event.params;
            },

            showdownMethod(news){
                var converter = new showdown.Converter();
                return converter.makeHtml(news);
            },

            comment(news){

                this.commentLoader = true;

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
                        this.commentLoader = false;
                        this.$notify({type: 'success', text: 'Comment was posted successfully', speed:400});
                    }

                }.bind(this));

            },

            /*getEstimatedAccountValue(accountName){
                console.log(steem.formatter.estimateAccountValue(accountName));
            }*/

        }
    }
</script>
