<template>
  <div>
   <div class="alert alert-primary" role="alert">
    {{message}}
    </div>
  </div>
</template>
<script>
const default_layout = "default";


export default {
  computed: {},
  data() {
      return {
          message:'Hello World! Our Laravel-Vue-Bootstrap app is ready'
      }
  },
};
</script>