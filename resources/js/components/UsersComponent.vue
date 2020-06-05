<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Hello Component</div>

                    <div class="card-body">
                        <div class="card" style="width: 18rem;" v-if="users[0].length > 0">                           
                            <ul class="list-group list-group-flush" v-for="user in users[0]">

                                <li class="list-group-item">{{user.name}}</li>
                            </ul>
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
            let vue = this;
            console.log(vue)
            axios.get('/api/users').then(function(response){
                // console.log(response)
                vue.users.push(response.data);
                // console.log(vue.users)
            });
        },
        data(){
            return {
                users:[]    //array.push!!!!!!
            };
        }
    }
</script>
