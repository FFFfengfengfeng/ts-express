<template>
    <yd-layout>
        <yd-navbar slot="navbar" title="破电影" bgcolor="#CC0001" color="#FFF"></yd-navbar>
        <yd-list theme="4" class="moive-list">
            <yd-list-item v-for="item in list" class="moive-list-item">
                <img class="moive-img" slot="img" :src="item.pic">
                <span slot="title">{{item.title}}</span>
                <yd-list-other slot="other">
                    <div>
                        <span>观众    </span><span class="moive-score">{{item.score}}</span>
                        <p>{{item.intro}}</p>
                    </div>
                    <div>
                        <a href=""></a>
                    </div>
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
          pic: 'https://ss0.baidu.com/6ONWsjip0QIZ8tyhnq/it/u=676005078,3798322765&fm=58',
          title: '拆弹专家',
          score: '9.1',
          intro: '爆炸袭击案,拆弹反恐难'
        },
        {
          pic: 'https://ss0.baidu.com/6ONWsjip0QIZ8tyhnq/it/u=4010451537,3504562222&fm=58',
          title: '春娇救志明',
          score: '8.8',
          intro: '春娇不再等,志明终成长'
        },
        {
          pic: 'https://ss1.baidu.com/6ONXsjip0QIZ8tyhnq/it/u=1386331657,2418346112&fm=58',
          title: '银河护卫队2',
          score: '大文',
          intro: '星爵身世迷,终于见爹地'
        },
        {
          pic: 'https://ss2.baidu.com/6ONYsjip0QIZ8tyhnq/it/u=2377327679,2050998191&fm=58',
          title: '速度与激情',
          score: '9.4',
          intro: '车王要黑化,家族被击垮'
        }
      ]
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="less" scoped>
    .moive-img{
        max-width: 90%;
        height: 1.8rem;
    }
    .moive-score{
        color: #FFC029;
    }
</style>
