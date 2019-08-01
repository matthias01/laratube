Vue.component('subscribe-button', {

    props:{
        subscriptions:{
          type: Array,
          required:true,
          default: {} = [],
      }
    },
    methods:{
        toggleSubscription(){
            if (!__auth()){
                alert('Please Login to Subscribe.');

            }else {

            }
        }
    }
});