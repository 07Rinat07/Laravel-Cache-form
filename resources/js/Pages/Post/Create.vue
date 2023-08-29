<template>
    <div class="mb-4 pt-6">
        <h3 class="text-xl">
            Добавить пост
        </h3>
    </div>
    <div>
        <div>
            <div class="mb-4">
                <input type="text" class="border-gray-300" v-model="title">
            </div>
            <div class="mb-4">
                <input type="text" class="border-gray-300" v-model="content">
            </div>
            <div class="mb-4">
                <a @click.prevent="store" href="#" class="inline-block px-3 py-2 text-white bg-sky-700">Добавить</a>
            </div>
        </div>
    </div>

</template>


<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import axios from "axios";

export default {
    name: "Create",
    layout: MainLayout,


    data() {
        return {
            'title': '',
            'content': '',
            'days_for_create': 0
        }
    },
    methods: {
        store() {
            axios.post('/posts', {
                title: this.title,
                content: this.content,
                days_for_create: this.days_for_create
            }).then(res => {
                this.title = ''
                this.content = ''
                this.days_for_create = 0
            })
        }
    }
}
</script>


<style scoped>

</style>
