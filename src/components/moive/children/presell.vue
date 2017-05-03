<template>
    <div class="moive_details">
        <yd-layout>
            <yd-navbar slot="navbar" title="presell" bgcolor="#CC0001" color="#FFF">
                <router-link to="/moive" slot="left">
                    <yd-navbar-back-icon color="#FFF"></yd-navbar-back-icon>
                </router-link>
            </yd-navbar>
            <p>{{msg}}</p>
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
        msg: 'presell'
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="less">
</style>
