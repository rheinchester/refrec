<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div v-if="posts.length > 0">
                    <div class="card" v-for="post in posts">
                        <div class="card-header">Posts</div>

                        <div class="card-body">
                            {{post.content}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ListAllPosts",
        mounted() {
           this.$root.$on('post-created', post => {
               this.posts.push(post)
           })
        },
        data() {
            return {
                posts: []
            }
        },
    }
</script>
