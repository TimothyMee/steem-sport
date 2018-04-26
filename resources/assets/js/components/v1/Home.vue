<template>
    <div class="blog-area ptb-80">
        <div id="preloader" v-if="!start"></div>
        <div class="container" v-else="">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" v-for="news in newsData">
                            <div class="post-row post-row-3">
                                <div class="post-header">
                                    <div class="header-post-img" v-if="news.previewImage">
                                        <img :src="news.previewImage" alt="" style="width: 350px; height: 300px;"/>
                                    </div>
                                    <div v-else="">

                                    </div>
                                    <div class="post-meta text-center">
                                        <div class="meta-box meta-box-left"><img src="/assets/img/admin.png" alt="responsive img"><span>By Admin</span></div>
                                        <div class="meta-box">
                                            <ul class="sticker-box">
                                                <li>
                                                    <h3 class="post-share-title">Dec 21,2017</h3></li>
                                                <li><a href="#"><i class="fa fa-heart-o"></i>2</a></li>
                                                <li><a href="#"><i class="fa fa-comment-o"></i>5</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-body">
                                    <h2 class="post-heading post_h3"><a href="#" @click.prevent="openModal(news)">{{news.title}}</a></h2>
                                    <p v-html="news.bodyPreview"></p>
                                    <p></p>
                                </div>
                                <div class="post-footer">
                                    <div class="btn-post">
                                        <a href="#" @click.prevent="openModal(news)">Continue Reading</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <div class="widget-area mb-60">
                            <div class="widget-header">
                                <h3 class="widget-title">Recent Updates</h3>
                            </div>
                            <div class="widget-vandor">
                                <img src="img/sidebar/vandor.png" alt="responsive img">
                                <h3 class="vandor-name">Nathan Dylan </h3>
                                <p>Do not use this images for finally produc The image use. Do Not Try</p>
                            </div>
                        </div>
                        <div class="widget-area mb-60">
                            <div class="widget-header">
                                <h3 class="widget-title">To Do</h3>
                            </div>
                            <ul class="liveon-list">
                                <li>
                                    <h4 class="liveon-title"><a href="#">Olympic</a></h4>
                                    <h4 class="liveon-sub-title"><a href="#">The Other Elements for Lead</a></h4>
                                    <p>Record-breaking Usain Bolt and Michael Phelps, 11,303 athletes competing .</p>
                                </li>
                                <li>
                                    <h4 class="liveon-title"><a href="#">Rugby</a></h4>
                                    <h4 class="liveon-sub-title"><a href="#">The Other Elements for Lead</a></h4>
                                    <p>Record-breaking Usain Bolt and Michael Phelps, 11,303 athletes competing .</p>
                                </li>
                                <li>
                                    <h4 class="liveon-title"><a href="#">Login Feature</a></h4>
                                    <h4 class="liveon-sub-title"><a href="#">The Other Elements for Lead</a></h4>
                                    <p>Record-breaking Usain Bolt and Michael Phelps, 11,303 athletes competing .</p>
                                </li>
                            </ul>
                        </div>
                        <div class="widget-area mb-60">
                            <div class="widget-header">
                                <h3 class="widget-title">About Me</h3>
                            </div>
                            <div class="widget-vandor">
                                <img src="img/sidebar/vandor.png" alt="responsive img">
                                <h3 class="vandor-name">Timothy-Mee</h3>
                                <p>To contribute mail to <a href="mailto:timothy33.tf@gmail.com">timothy33.tf@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 text-right mt-30">
                    <ul class="pagination pagination-1 foo">
                        <li class="active"><a href="#">01</a></li>
                        <li><a href="#">02</a></li>
                        <li><a href="#">03</a></li>
                        <li><a href="#">04</a></li>
                        <li><a href="#">....</a></li>
                        <li><a href="#">10</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
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
