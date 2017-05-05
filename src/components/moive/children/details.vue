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
                <div 
                    :class="isIntro ? 'open' : 'close'" class="moive-intro-content" 
                    ref="content" 
                    @click="openContent()"
                    >
                    <p>章在山（刘德华 饰）是香港警队“爆炸品处理科”的一名高级督察。七年前，他潜伏到头号通缉犯火爆（姜武 饰）的犯罪团伙中，在一次打劫金库的行动中，章在山表露了其拆弹组卧底的身份，与警方里应外合，成功阻止炸弹引爆，并将火爆及其弟的犯罪组织一网打尽，可惜在千钧一发之间，火爆逃脱并扬言誓要报仇。复职后的章在山很快被晋升为警队的拆弹专家。七年后，香港接二连三遭遇炸弹恐怖袭击，警方更收到线报大批爆炸品已偷运入港，一切迹象显示香港将有大案发生。就在香港人心惶惶之际，城中最繁忙的红磡海底隧道被悍匪围堵拦截，数百名人质被胁持，终于现身的火爆威胁警方炸毁隧道。章在山唯有将火爆绳之于法，才能拆解这场反恐风暴背后的惊天阴谋……</p>
                </div>
                <div class="moive-intro-btn" :class="isIntro ? 'open' : 'close'" @click="openContent()">
                    <yd-navbar-back-icon ></yd-navbar-back-icon>
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
    data() {
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
            },
            isIntro: false,
            contentHeight: 0
        }
    },
    methods: {
        openContent: function() {
            this.isIntro = !this.isIntro;
        }
    },
    mounted() {
        
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="less">
    .moive_details{
        position: absolute;
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
    .movie-intro{
        padding: .3rem;
        text-align: center;
        .moive-intro-content{
            text-align: justify;
            color: #33485c;
            font-size: .29rem;
            line-height: .42rem;
            cursor: pointer;
            -webkit-tap-highlight-color: rgba(0,0,0,0);
            overflow: hidden;
            transition: max-height .2s linear;
            -webkit-transition: max-height .2s linear;
        }
        .moive-intro-content.open{
            max-height: 100rem !important;
        }
        .moive-intro-content.close{
            max-height: 1.26rem;
        }
    }
    .moive-intro-btn{
        cursor: pointer;
        -webkit-tap-highlight-color: rgba(0,0,0,0);
        i:before{
            transform: rotate(-90deg);
            transition: transform .2s ease-in-out;
            -webkit-transition: -webkit-transform .2s ease-in-out;
        }
    }
    .moive-intro-btn.open{
        i:before{
            transform: rotate(90deg);
        }
    }
    .moive-intro-btn.close{
        i:before{
            transform: rotate(-90deg);
        }
    }
</style>
