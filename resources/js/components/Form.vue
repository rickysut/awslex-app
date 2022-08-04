<template>
    <div class="input-group mb-2">
      
      	<input type="text" name="message" class="form-control" placeholder="Write a message .." v-model="message" @keyup.enter="submit">
        <div class="input-group-append">
          
          	<button class="btn btn-primary btn-sm" id="btn-chat" @click="submit">
                <i class="fa fa-play"></i>
            </button>
            <button class="btn btn-danger btn-sm" id="btn-clear" @click="clearMessage">
                <i class="fa fa-eraser"></i>
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                message: ''
            }
        },

        methods: {
            submit() {
                //console.log('msg = '+this.message)
                if (this.message != ''){
                    this.$emit('sent', {
                        user: this.user,
                        message: this.message
                    });
                }
                this.message = '';
                
                
            },
            clearMessage() {
                this.$emit('clear');
            }
        }    
    }
</script>