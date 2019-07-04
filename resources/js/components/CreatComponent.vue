<template>

    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Create A Post</div>

                <div class="card-body">
                    <form class="" @submit.prevent="addPost()">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Post Title:</label>
                                    <input type="text" class="form-control" v-model="post.title" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <label>Post Content:</label>
                                    <textarea class="form-control" v-model="post.body" rows="5" ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-1">
                            <input type="submit" class="btn btn-primary" name="Create" value="Create">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                post:{}
            }
        },
        methods: {
            addPost(){
                let uri = 'http://localhost:8000/api/post/create';
                this.axios.post(uri, this.post).then((response) => {
                   this.$router.push({name: 'home'});
                });

            }
        }
    }


</script>