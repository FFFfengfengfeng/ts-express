<template>
    <yd-list theme="4"> 
        <yd-list-item v-for="item in list">
            <img slot="img" :src="item.pic">
            <span slot="title">{{item.title}}</span>
            <yd-list-other slot="other">
                <div>
                    <span class="list-price"><em>¥</em>{{item.text}}</span>
                </div>
                <div>content</div>
            </yd-list-other>
        </yd-list-item>
    </yd-list>
</template>

<script>
export default {
  name: 'moive',
  data () {
    return {
      list: [
        {
          pic: '',
          title: '拆弹专家',
          text: '大文'
        }
      ]
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
