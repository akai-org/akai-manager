<template>
  <div class="hello">
    Hello world component1
    <inside-component></inside-component>
  </div>
</template>

<script>
import InsideComponent from './InsideComponent'
export default {
  name: 'HelloWorld',
  components: {
    InsideComponent
  },
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  }
}
</script>
