<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Posts</div>

                <div class="card-body">

                        <router-link :to="{ name: 'create' }" class="btn btn-primary">Create Post</router-link>

                    <table class="table table-hover mt-2">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="post in posts" :key="post.id">
                                <td>{{post.id}}</td>
                                <td>{{post.title}}</td>
                                <td>{{post.body}}</td>
                                <td><router-link :to="{name: 'edit', params: { id: post.id }}" class="btn btn-success">Edit</router-link></td>
                                <td><input type="submit" class="btn btn-danger" name="Delete" value="Delete" @click.prevent="deletePost(post.id)"></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                posts: []
            }
        },
        created(){
            let uri = 'http://localhost:8000/api/posts';
            this.axios.get(uri).then((response) =>{
                this.posts = response.data.data;
            });
        },
        methods:{
            deletePost(id){
                let uri = `http://localhost:8000/api/post/delete/${id}`;
                this.axios.delete(uri).then((response) =>{
                    this.posts.splice(this.posts.indexOf(id), 1);
                });
            }
        }
    }

</script>