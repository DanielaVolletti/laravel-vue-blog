<template>
  <div class="container" v-show="!deleted">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                <div class="card-header title">
                  <span v-show ="!isEditField('title')" @click="setEditField('title')">{{dTitle}}</span>
                  <input type="text" v-show ="isEditField('title')" v-model= "dTitle">
                  <i v-show ="isEditField('')" class="fas fa-trash-alt" @click="destroy"></i>
                  <i v-show ="!isEditField('')" class="fas fa-trash-alt" @click="undo"></i>
                  <i v-show ="!isEditField('')" class="fas fa-share" @click="update"></i>
                </div>
                <div class="card-body">
                  <p v-show ="!isEditField('text')" @click="setEditField('text')">{{dText}}</p>
                  <textarea v-show ="isEditField('text')" v-model="dText"></textarea>
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
            deleted: false,
            editingField: "",
            dTitle: this.title,
            dText: this.text
          };
        },
        props: {
          id: Number,
          title: String,
          text: String
        },
        methods: {
          setEditField(field) {
            this.editingField = field;
          },
          isEditField(field) {
            return this.editingField === field;
          },
          undo(){
            this.editingField = "";
            this.dTitle = this.title;
            this.dText = this.text;
          },
          update(){
            var post = {
              _token: token,
              title: this.dTitle,
              text: this.dText
            };
            console.log(post);
            var _this = this;
            axios.post('/update/' + this.id, post)
                 .then(function (res) {
                   console.log(res);
                   _this.setEditField('');
                 })
                 .catch(function (err) {
                   console.log(err);
                 });
          },
          destroy() {
            var _this = this;
            axios.post('/destroy/' + this.id)
                 .then(function(response) {
                     var status = response['status'];
                     if(status === 200) {
                       _this.deleted = true;
                     }
                 })
                 .catch(function(error) {
                    console.log("err: ", error);
                 });
          }



        }
    }
</script>
