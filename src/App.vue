<template>
  <div id="app">
    <yd-layout>
        <router-view></router-view>
        <yd-tabbar slot="tabbar">
            <yd-tabbar-item title="电影" link="/Index" active>
                <yd-icon name="video" slot="icon"></yd-icon>
            </yd-tabbar-item>
            <yd-tabbar-item title="影院" link="/Moive">
                <yd-icon name="home" slot="icon"></yd-icon>
            </yd-tabbar-item>
            <yd-tabbar-item title="发现" link="#">
                <yd-icon name="discover" slot="icon"></yd-icon>
            </yd-tabbar-item>
            <yd-tabbar-item title="我的" link="#">
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
