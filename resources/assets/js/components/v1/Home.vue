<template>

    <div>
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
                            <div class="col-md-4 col-sm-6 col-xs-6" v-for="news in newsData">
                                <div class="single-blog-slide" v-if="news.page == pagination">
                                    <div class="images">
                                        <a href="#" @click.prevent="openModal(news)" data-target="#newsModal" data-toggle="modal" v-if="news.previewImage">
                                            <img :src="news.previewImage"
                                                 style="max-height:200px; width: 100%; height:200px;"
                                                 alt="Blog Image">
                                        </a>

                                        <a href="#" @click.prevent="openModal(news)" data-target="#newsModal" data-toggle="modal" v-else>
                                            <img src="/assets/v1/images/video-bg.jpg"
                                                 style="max-height:200px; width: 100%; height:200px;"
                                                 alt="Blog Image">
                                        </a>
                                    </div>
                                    <div class="blog-details">
                                        <span class="date">
                                            <i class="fa fa-calendar-check-o"></i>
                                            {{moment(news.created).format("MMMM Do YYYY")}} &nbsp;&nbsp;
                                            <i class="fa fa-heart"></i> {{news.active_votes.length}} &nbsp;&nbsp;
                                            <i class="fa fa-comment"></i> {{news.replies.length}}
                                        </span>
                                        <h3><a href="#" @click.prevent="openModal(news)" data-target="#newsModal" data-toggle="modal">{{news.title}}</a></h3>
                                        <div class="read-more">
                                            <a href="#" @click.prevent="openModal(news)" data-target="#newsModal" data-toggle="modal">Read More</a>
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
                                <span class="title">Categories <span class="badge">new</span></span>
                                <ul>
                                    <li v-for="(news,index) in newsData" v-if="index < 12">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">{{news.category}}</a>
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

        <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1" id="newsModal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="fa fa-close"></span>
            </button>
            <div class="modal-dialog modal-dialog-centered" style="color:white">
                <div class="modal-content" style="color:white">
                    <p v-html="currentNews.news" style="color: white;">

                    </p>

                    <i class="fa fa-calendar-check-o"></i>
                    {{moment(currentNews.created).format("MMMM Do YYYY")}} &nbsp;&nbsp;
                    <i class="fa fa-heart"></i> {{currentNews.upvotes.length}} &nbsp;&nbsp;
                    <i class="fa fa-comment"></i> {{currentNews.comments.length}}
                </div>
            </div>
        </div>


    </div>

</template>

<script>
    export default {

        data(){
            return{
               newsData: {},
                start:false,
                pagination:1,
                currentNews: {
                   news : 'nothing',
                   upvotes : 0,
                   comments : 0,
                   created_at : 0
                },
            }
        },

        mounted() {
            console.log('Component mounted.');
            this.getData();
        },

        methods:{
            getData(){
                steem.api.getDiscussionsByTrending({"tag":"sport", "limit": "50"}, function(err, result) {

                    if (result){
                        this.arrangeData(result);
                    }
                }.bind(this));
            },

            arrangeData(newsData){

                var i = 1;
                var currentNewsData = [];
                newsData.forEach(function (news){
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

                    i++;
                });

                console.log("Guyyyyy");
                console.log(newsData);

                this.newsData = newsData;

                this.start = true;
            },

            paginate(page){
                this.pagination = page;
            },

            openModal(news){
                this.currentNews.news = news.newBody;
                this.currentNews.upvotes = news.active_votes;
                this.currentNews.comments = news.replies;
                this.currentNews.created_at = news.created;
            }
        }
    }
</script>
