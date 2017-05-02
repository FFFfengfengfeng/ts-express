<template>
  <div id="app">
    <yd-layout>
        <yd-navbar slot="navbar" title="破电影" bgcolor="#CC0001" color="#FFF">
        </yd-navbar>

        <router-view></router-view>

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
  </div>
</template>

<script>
export default {
  name: 'app'
}
</script>

<style>
  #app{
    height: 100%;
  }
</style>
