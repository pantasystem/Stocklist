<template>
    <div style="text-align: right;">
        <v-btn @click="$store.state.box.boxAddFlag = true" icon>
            <v-icon>mdi-plus</v-icon>
        </v-btn>
    </div>
</template>

<script>
export default {
    name: 'BoxHeader',
}
</script>
