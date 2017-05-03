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
		            <yd-list theme="4" class="moive-list">
				        <yd-list-item class="moive-list-item">
				            <img class="moive-img" slot="img" >
				            <span slot="title"></span>
				            <yd-list-other slot="other"></yd-list-other>
				        </yd-list-item>
				    </yd-list>
	            </div>
        	</div>
            
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
        	pic: '',
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
    	padding: .3rem 0;
    	.list-theme4,.list-mes{
    		background-color: rgba(0,0,0,0) !important;
    	}
    }
</style>
