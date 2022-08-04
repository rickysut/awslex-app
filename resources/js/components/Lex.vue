<template>
    <ul class="chat">
        <li class="left clearfix">
            <div>
                sessionId: {{ data.sessionId }}
            </div>
        </li>
        <li class="left clearfix">
            <div>
                dialogState: {{ data.dialogState }}
            </div>
        </li>
        <li class="left clearfix">
            <div>
                intentName: {{ data.intentName }}
            </div>
        </li>
        <li class="left clearfix">
            <div>
                slots: {{ data.slots }}
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        props: ['data']
    }
</script>
