<template>
    <yd-layout>
        <yd-navbar slot="navbar" title="破电影" bgcolor="#CC0001" color="#FFF"></yd-navbar>
        <yd-list theme="4" class="moive-list">
            <yd-list-item v-for="item in list" class="moive-list-item" href="">
                <img class="moive-img" slot="img" :src="item.pic">
                <span slot="title">{{item.title}}</span>
                <yd-list-other slot="other">
                    <div>
                        <p v-if="item.isShow">
                            <span>观众    </span><span class="moive-score">{{item.score}}</span>
                        </p>
                        <p v-else>
                            <span class="moive-score">{{item.wantNums}}</span><span>   人想看</span>
                        </p>
                        <p>{{item.intro}}</p>
                        <p>{{item.show}}</p>
                    </div>
                    <p v-if="item.isShow" class="moive-btn">
                        <a href="" class="moive-btn_show">购票</a>
                    </p>
                    <p v-else class="moive-btn">
                        <a href="">预售</a>
                    </p>
                </yd-list-other>
            </yd-list-item>
        </yd-list>
        <yd-tabbar slot="tabbar" activeColor="#CC0001">
            <yd-tabbar-item title="电影" link="/moive" active>
                <yd-icon name="video" slot="icon"></yd-icon>
            </yd-tabbar-item>
            <yd-tabbar-item title="影院" link="/cinema">
                <yd-icon name="home-outline" slot="icon"></yd-icon>
            </yd-tabbar-item>
            <yd-tabbar-item title="发现" link="/discovery">
                <yd-icon name="discover" slot="icon"></yd-icon>
            </yd-tabbar-item>
            <yd-tabbar-item title="我的" link="/home">
                <yd-icon name="ucenter-outline" slot="icon"></yd-icon>
            </yd-tabbar-item>
        </yd-tabbar>
    </yd-layout>
</template>

<script>
export default {
  name: 'moive',
  data () {
    return {
      msg: 'moive',
      list: [
        {
          pic: '//p1.meituan.net/movie/cc50791238502ae1fa08df764c5f5c97223987.jpg@128w_180h',
          title: '拆弹专家',
          score: '9.1',
          intro: '爆炸袭击案,拆弹反恐难',
          show: '今天146家影院放映1420场',
          isShow: true,
          wantNums: null
        },
        {
          pic: '//p0.meituan.net/movie/ff46b5edfbd2f737219b9eed78e25fa2969775.jpg@128w_180h',
          title: '春娇救志明',
          score: '8.8',
          intro: '春娇不再等,志明终成长',
          show: '今天146家影院放映1420场',
          isShow: true,
          wantNums: null
        },
        {
          pic: '//p0.meituan.net/movie/fbe5f97c016c9f4520109dc70f458d4d83363.jpg@128w_180h',
          title: '银河护卫队2',
          score: null,
          intro: '星爵身世迷,终于见爹地',
          show: '今天146家影院放映1420场',
          isShow: false,
          wantNums: 140670
        },
        {
          pic: '//p1.meituan.net/movie/af297f59e363ce96290dfea22f6fea0c153020.jpg@128w_180h',
          title: '速度与激情',
          score: '9.4',
          intro: '车王要黑化,家族被击垮',
          show: '今天146家影院放映1420场',
          isShow: true,
          wantNums: null
        }
      ]
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="less">
    .moive-img{
        margin-top: 0 !important;
    }

    .moive-list-item{
        .list-img{
           width: 1.28rem !important;
           height: 1.8rem;
           padding: 0 !important;
        }
        p{
            color: #666;
            padding: .03rem 0;
        }
        .moive-score{
            color: #FFC029;
            font-size: .32rem;
        }
        .moive-btn{
            position: absolute;
            right: 0;
            top: 50%;
            margin: auto;
            a{
                display: block;
                border: 1px solid;
                padding: .1rem .23rem;
                margin-top: -0.29rem;
                border-radius: 4px;
                color: #52B0EB;
                border-color: #52B0EB;
                background: #FFF;
            }
            .moive-btn_show{
                color: #EF4238;
                border-color: #EF4238;
            }
        }
        .list-mes{
            padding: .05rem 0;
        }
        .list-title{
            font-size: .3rem !important;
            font-weight: normal !important;
            color: #222 !important;
        }
    }
    .moive-list{
        padding: 0 .25rem !important;
    }
    .moive-list-item{
        padding: .25rem 0 .2rem 0 !important;
    }
</style>
