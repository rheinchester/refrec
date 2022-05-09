<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Post</div>

                    <div class="card-body">
                        Create New Post
                        <div class="form-group">
                            <label for="content"> post content</label>
                            <textarea name="content" id="content" cols="30" rows="3" placeholder="Say something..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
