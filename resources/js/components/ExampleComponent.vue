<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{prop_title}}: {{ title }}</div>
                    <div class="card-body">
                        <span>{{ description }}</span> <br>
                        <span> First name:
                        <input type="text" v-model= 'fname'></span><br>
                        <span> Last name: <input type="text" v-model= 'lname'></span><br>
                        <span>Full name : {{fullName}} </span><br>
                        <span>NumberRandComputed: {{ comp_rnd }} </span><br>
                        <span>NumberRandMethod: {{ getRnd() }} </span><br>
                        <span><input type="number" v-model='km'></span><br>
                        <span><input type="number" v-model='m'></span><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
          return {
            title: "Example Component",
            description: "I'm an example component",
            fname: "",
            lname: "",
            m: 0,
            km: 0
          };
        },
        props: {
          prop_title: String
        },
        computed: {
          comp_rnd: function() {
            return Math.floor(Math.random() * 100);
          },
          fullName : function() {
             return this.fname + " " + this.lname;
          }
        },
        methods: {
          getRnd() {
            return Math.floor(Math.random() * 100);
          },
          getFullname() {
            return this.fname + " " + this.lname;
          }
        },
        watch: {
          km: function(val){
            this.km = val;
            this.m = val * 1000;
          },
          m: function (val) {
            this.m = val;
            this.km = val / 1000;
          }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
