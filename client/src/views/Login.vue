<template>
    <v-app>


        <v-card width="400px" class="mx-auto mt-5">
            <v-card-title class="mx-auto mt-5">
                <h1 class="display-1">ログイン</h1>
            </v-card-title>
            <v-card-text>
                <v-form>
                    <v-text-field
                        prepend-icon="mdi-account-circle"
                        label="メールアドレス"
                        v-model="email"
                    />
                    <span v-if="errors.email">
                        {{ errors.email[0] }}
                    </span>
                    <v-text-field
                        v-bind:type="showPassword ? 'text' : 'password'"
                        @click:append="showPassword = !showPassword"
                        prepend-icon="mdi-lock" 
                        v-bind:append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                        label="パスワード"
                        v-model="password"
                    />
                    <span v-if="errors.password">
                        {{ errors.password[0] }}
                    </span>
                    <v-card-actions>
                        <v-btn class="info" @click="login">ログイン</v-btn>
                    </v-card-actions>
                </v-form>
            </v-card-text>
        </v-card>

    </v-app>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Login',
    data(){
        return {
            showPassword : false,
            email:'',
            password:'',
            errors: []
        }
    },
    methods:{
        async login() {
            await axios.post("/api/login", {
                email: this.email,
                password: this.password,
            })
            .then(()=>{
                sessionStorage.setItem("login", true);
                this.$router.push('/', () => {});
            })
            .catch(error => {
                console.log(error);
            });
        }
    }
}
</script>