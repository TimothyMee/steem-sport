<template>
    <div class="blog-area ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="post-row post-row-3">
                                <div class="post-header">
                                    <div class="header-post-img">
                                        <img src="/assets/img/blog/1.jpg" alt="" />
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
                                    <h2 class="post-heading post_h3"><a href="standard-post-sidebar.html">The Great Sport Relief Bake
                                        three  as it happened</a></h2>
                                    <p>Tempor duis single-origin coffee Eyeo next level ethnic fingerstache fannyo pack nostrud tempor duis single.Tempor duis single-origin coffee Eyeo next level .</p>
                                </div>
                                <div class="post-footer">
                                    <div class="btn-post">
                                        <a href="#" @click.prevent="testAxios">Continue Reading</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="post-row post-row-3">
                                <div class="post-header">
                                    <div class="header-post-img">
                                        <img src="/assets/img/blog/2.jpg" alt="" />
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
                                    <h2 class="post-heading post_h3"><a href="standard-post-sidebar.html">The Great Sport Relief Bake
                                        three  as it happened</a></h2>
                                    <p>Tempor duis single-origin coffee Eyeo next level ethnic fingerstache fannyo pack nostrud tempor duis single.Tempor duis single-origin coffee Eyeo next level .</p>
                                </div>
                                <div class="post-footer">
                                    <div class="btn-post">
                                        <a href="#">Continue Reading</a>
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
        mounted() {
            console.log('Component mounted.')
        },

        methods:{
            getData(){
                axios.get('/')
                    .then(response =>{
                        console.log(response);
                    })
            }
        }
    }
</script>
