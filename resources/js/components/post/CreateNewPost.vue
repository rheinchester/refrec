<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Post</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="content"> Post content</label>
                            <textarea name="content"
                                    class="form-control"
                                    id="content" 
                                    cols="30" 
                                    rows="3" 
                                    :disabled="creatingPost"
                                    placeholder="Say something..."
                                    v-model="content"
                            >
                            </textarea>
                        </div>
                    </div>
                    
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" @click="creatingPost() :disabled="creatingPost"     ">
                            Post
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreateNewPost",
        mounted() {
            // console.log('Component mounted.')
        }
        , data() {
            return {
                creatingPost: false,
                errors: null,
                content: "",
            }
        },
        methods: {
            creatingPost(){
                this.creatingPost = true;
                axios.post('/posts', {content: this.content})
                .then(response=>{
                    this.creatingPost = false;
                })
                .catch(error => {
                    this.creatingPost = false;
                });
            }
        },

    }
</script>
