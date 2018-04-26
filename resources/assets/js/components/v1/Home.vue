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
            <div class="" style="height:150px">
                <img src="/assets/v1/images/breadcrumbs/blog-left.jpg" alt="Breadcrubs-image"/>
            </div>
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
                                <div class="single-blog-slide">
                                    <div class="images">
                                        <a href="blog-single.html"><img :src="news.previewImage" alt="Blog Image"></a>
                                    </div>
                                    <div class="blog-details">
                                        <span class="date"><i class="fa fa-calendar-check-o"></i>{{news.active}}</span>
                                        <h3><a href="#">{{news.title}}</a></h3>
                                        <div class="read-more">
                                            <a href="#">Read More</a>
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
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
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
                                <span class="title">Categories <span class="badge">Trending</span></span>
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
                            <div class="archives-box">
                                <span class="title">Categories <span class="badge">new</span></span>
                                <ul>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">Category Title 1</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">Archives 2</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">Archives 3</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">Archives 4</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="recent-post-area">
                                <span class="title"> Recent Post</span>
                                <ul class="news-post">
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
                                                <div class="item-post">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 paddimg-right-none">
                                                            <img src="images/blog-details/sm1.jpg" alt="" title="News image" />
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                            <h4><a href="blog-single.html">Raken develops The software</a></h4>
                                                            <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> June 28, 2017</span>
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
                                                            <img src="images/blog-details/sm2.jpg" alt="" title="News image" />
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                            <h4><a href="blog-single.html">TRaken develops The software</a></h4>
                                                            <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> June 28, 2017</span>
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
                                                            <img src="images/blog-details/sm3.jpg" alt="" title="News image" />
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                            <h4><a href="blog-single.html">Raken develops The software</a></h4>
                                                            <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> June 28, 2017</span>
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
                                    <li>
                                        <a href="#">Ball</a>
                                    </li>
                                    <li>
                                        <a href="#">Coach</a>
                                    </li>
                                    <li>
                                        <a href="#">League</a>
                                    </li>
                                    <li>
                                        <a href="#">Point</a>
                                    </li>
                                    <li>
                                        <a href="#">Ball</a>
                                    </li>
                                    <li>
                                        <a href="#">Coach</a>
                                    </li>
                                    <li>
                                        <a href="#">League</a>
                                    </li>
                                    <li>
                                        <a href="#">Point</a>
                                    </li>
                                    <li>
                                        <a href="#">Ball</a>
                                    </li>
                                    <li>
                                        <a href="#">Coach</a>
                                    </li>
                                    <li>
                                        <a href="#">Point</a>
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

    </div>

</template>

<script>
    export default {

        data(){
            return{
               newsData: {},
                start:false,
            }
        },

        mounted() {
            console.log('Component mounted.');
            this.getData();
        },

        methods:{
            getData(){
                steem.api.getDiscussionsByCreated({"tag":"sport", "limit": "10"}, function(err, result) {

                    if (result){
                        this.arrangeData(result);
                    }
                }.bind(this));
            },

            arrangeData(newsData){

                newsData.forEach(function (news){
                    var converter = new showdown.Converter();
                    news.newBody = converter.makeHtml(news.body);

                    var bodyPreview = news.newBody.substring(0, 200);

                    var imageLink = bodyPreview.indexOf('<p')
                    var imageLinkEnd =  imageLink + bodyPreview.substring(imageLink).indexOf("</p>")
                    var previewDataWithoutImage = bodyPreview.slice (imageLink,imageLinkEnd+1);

                    news.bodyPreview = previewDataWithoutImage.substring(0,100);

                    var metadata = JSON.parse(news.json_metadata);
                    if (metadata.image){
                        news.previewImage = metadata.image[0];
                    }
                });

                console.log("Guyyyyy");
                console.log(newsData);

                this.newsData = newsData;

                this.start = true;
            },

            openModal(news){
                console.log("news = ",news);
            }
        }
    }
</script>
