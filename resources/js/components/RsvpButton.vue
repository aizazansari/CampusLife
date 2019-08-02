<template>
    <div class="container">
        <button class="btn btn-primary ml-4" @click="attend">RSVP</button>
    </div>
</template>

<script>
    export default {
      props: ['post'],

        mounted() {
            console.log('Component mounted.')
        },

        methods: {
          attend(){
            axios.post('/attend/'+this.post)
              .then(response=>{
                console.log(response.data);
              });
          }
        }

    }
</script>
