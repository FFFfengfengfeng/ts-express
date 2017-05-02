<template>
    <div class="moive_details">
        <yd-layout>
            <yd-navbar slot="navbar" title="ticket" bgcolor="#CC0001" color="#FFF">
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
        msg: 'ticket'
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
</style>
