<template>
    <div class="moive_details">
        <yd-layout>
        	<div class="moive-header">
        		<yd-navbar slot="navbar" bgcolor="rgba(0,0,0,0)" color="#FFF">
	                <router-link to="/moive" slot="left">
	                    <yd-navbar-back-icon color="#FFF"></yd-navbar-back-icon>
	                </router-link>
	            </yd-navbar>
	            <div class="moive-filter"></div>
	            <div class="moive-info">
		            <div class="moive-pic">
		                <img :src="moiveDetails.pic"/>
		            </div>
		            <div class="moive-other">
		                <p class="moive-title">拆弹专家</p>
		                <p>Shock Wave</p>
		                <section class="moive-btn-group">
		                    <a href="">
		                        <p>观众评分</p>
		                        <p><span class="moive-score">9.1</span>(7.0万人评)</p>
		                    </a>
		                    <a href="">
		                        <p>专业评分</p>
                                <p><span class="moive-score">9.1</span>(38人评)</p>
		                    </a>
		                </section>
		                <p>动作,悬疑,犯罪</p>
		                <p>中国香港/120分钟</p>
		            </div>
	            </div>
	            <section class="operation-btn">
	                <a href="javascript:;"><yd-icon name="like" size=".25rem" color="#FFF"></yd-icon>想看</a>
	                <a href="javascript:;"><yd-icon name="star" size=".25rem" color="#FFF"></yd-icon>看过</a>
	            </section>
        	</div>
            <section class="movie-intro">
                <div class="moive-intro-content">
                    <p>545454545454545454445454</p>
                </div>
            </section>
            <transition name="router-slid" mode="out-in">
                <router-view></router-view>
            </transition>
        </yd-layout>
    </div>
</template>

<script>
export default {
  data () {
    return {
        msg: 'details',
        moiveDetails: {
        	pic: '//p1.meituan.net/movie/cc50791238502ae1fa08df764c5f5c97223987.jpg@128w_180h',
        	title: '',
        	enTitle: '',
        	type: '',
        	region: '',
        	time: '',
        	viewerScore: '',
        	viewerNums: '',
        	professionScore: '',
        	professionNums: ''
        }
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="less">
    .moive_details{
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #FFF;
        z-index: 1500;
    }
    .m-navbar:after{
    	border-bottom: none !important;
    }
    .moive-header{
    	background: #40454d;
    	color: #FFF;
	    position: relative;
	    overflow: hidden;
	    -webkit-filter: blur(0);
    	filter: blur(0);
    }
    .moive-filter{
    	background-image: url(http://p1.meituan.net/177.249/movie/cc50791238502ae1fa08df764c5f5c97223987.jpg);
    	background-size: cover;
	    background-image: gray;
	    background-repeat: no-repeat;
	    background-position-y: 40%;
	    -webkit-filter: blur(.6rem);
	    filter: blur(.6rem);
	    overflow: hidden;
	    top: 0;
	    right: 0;
	    left: 0;
	    bottom: 0;
	    width: 100%;
	    height: 100%;
	    position: absolute;
    }
    .moive-info{
    	padding: .3rem;
    	-webkit-filter: blur(0);
        filter: blur(0);
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    	.list-theme4,.list-mes{
    		background-color: rgba(0,0,0,0) !important;
    	}
    	.moive-pic{
    	    width: 2.14rem;
            height: 3rem;
            border: 1px solid #f0f2f3;
            img{
                width: 100%;
                height: 100%;
            }
    	}
    	.moive-other{
    	    opacity: .85;
    	    -webkit-box-flex: 1;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
            padding-left: .3rem;
            p{
                padding: .07rem 0;
            }
            .moive-title{
                font-size: .32rem;
            }
    	}
    	.moive-btn-group{
    	    display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            position: relative;
            a{
                -webkit-box-flex: 1;
                -webkit-flex: 1;
                -ms-flex: 1;
                flex: 1;
            }
    	}
    	.moive-score{
    	    color: #FFC029;
            font-size: .32rem;
    	}
    	.moive-btn-group:after{
    	    display: block;
    	    position: absolute;
    	    background: #FFF;
    	    width: 1px;
    	    content: "";
    	    height: 60%;
    	    left: 44%;
    	    top: 20%;
    	}
    }
    .operation-btn{
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-filter: blur(0);
        filter: blur(0);
        padding-left: .3rem;
        padding-right: .15rem;
        a{
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
            border: 1px solid #FFF;
            margin: 0 .15rem .3rem 0;
            border-radius: 5px;
            text-align: center;
            padding: .15rem 0;
            background: #7C7A7B;
            opacity: .85;
            font-size: .25rem;
        }
        i{
            margin-right: .15rem;
        }
    }
    .m-navbar{
        z-index: 1500;
    }
</style>
