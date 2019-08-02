<template>
    <div class="container">
        <button class="btn btn-primary ml-4" @click="attend" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
      props: ['post','attending'],


        mounted() {
            console.log('Component mounted.')
        },
        data: function() {
          return {
            status: this.attending,
          }
        },

        methods: {
          attend(){
            axios.post('/attend/'+this.post)
              .then(response=>{
                this.status= ! this.status;
                console.log(response.data);
              })
              .catch(errors=>{
                if (errors.response.status == 401){
                  window.location='/login';
                }
              });
          }
        },
        computed: {
          buttonText() {
            console.log(this.status);
            return (this.status) ? 'Cancel RSVP' : 'RSVP';
          }
        }

    }
</script>
