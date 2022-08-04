<template>
    <ul class="chat">
        <li class="left clearfix" v-for="(message, index) in messages" :key="message + '-' + index">
            <div class="chat-body clearfix">
                <div v-bind:class="[ message.user.id==2  ? 'chat-msg user' : 'chat-msg self']">
                    
                    <div class="cm-msg-text">
                        {{ message.message }}
                    </div>
                </div>
                
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        props: ['messages']
    }
    
</script>
