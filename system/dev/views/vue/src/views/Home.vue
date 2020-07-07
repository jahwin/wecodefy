<template>
  <div class="home">
    <nav class="navigation">
      <img alt="Vue logo" :src="$store.state.base_url+'assets/images/wecodefy.png'" />
      <br />
    </nav>
    <div class="dev-options">
      <a-radio-group
        size="large"
        @change="onChangePanel"
        :defaultValue="selected_panel"
        buttonStyle="solid"
      >
        <a-radio-button value="Generate">Generate</a-radio-button>
        <a-radio-button value="Database">Database</a-radio-button>
        <a-radio-button value="Angular">Angular</a-radio-button>
        <a-radio-button value="Vue">Vue</a-radio-button>
        <a-radio-button value="React">React</a-radio-button>
        <a-radio-button value="Build">JS Build</a-radio-button>
      </a-radio-group>
    </div>
    <!-- Genelate panel -->
    <div class="dev-options-panel" v-show="selected_panel == 'Generate'">
      <div class="dev-task">
        <a-row>
          <a-col :span="6">
            <ul>
              <li>
                <a-checkbox v-model="generate.is.model">Model</a-checkbox>
              </li>
              <li>
                <a-checkbox v-model="generate.is.controller">Controller</a-checkbox>
              </li>
              <li>
                <a-checkbox v-model="generate.is.view">View</a-checkbox>
              </li>
            </ul>
          </a-col>
          <a-col :span="18">
            <a-row :gutter="16" type="flex" justify="end">
              <a-col :span="19">
                <a-row :gutter="10">
                  <!-- Folder name -->
                  <a-col :span="12">
                    <a-input placeholder="Folder name" v-model="generate.folder_name" size="large">
                      <a-icon slot="prefix" type="folder" />
                    </a-input>
                  </a-col>
                  <!-- File name -->
                  <a-col :span="12">
                    <a-input placeholder="Class name" v-model="generate.class_name" size="large">
                      <a-icon slot="prefix" type="codepen" />
                    </a-input>
                  </a-col>
                </a-row>
              </a-col>
              <a-col :span="5">
                <a-button
                  style="float:right;"
                  @click=" onGenerate()"
                  type="primary"
                  size="large"
                  :loading="generate.loading"
                >Generate</a-button>
              </a-col>
            </a-row>
            <a-row>
              <!-- Console -->
              <a-col :span="24">
                <div
                  class="dev-console"
                  v-chat-scroll="{always: false, smooth: true, scrollonremoved:false}"
                >
                  <code>console: ~ wecodefy</code>
                  <br />
                  <div v-for="(item,index) in generate.console" :key="index+'generate'">
                    <div v-if="item.status == 'success'">
                      <span style="color:green;font-size:10px" class>{{item.message}}</span>
                      <br />-------
                    </div>
                    <div v-if="item.status == 'fail'">
                      <span style="color:red;font-size:10px" class>{{item.message}}</span>
                      <br />-------
                    </div>
                  </div>

                  <span class="type-cursor">|</span>
                </div>
              </a-col>
            </a-row>
          </a-col>
        </a-row>
      </div>
    </div>
    <!-- Database panel -->
    <div class="dev-options-panel" v-show="selected_panel == 'Database'">
      <div class="dev-task">
        <a-row>
          <a-col :span="8">
            <ul>
              <li>
                <a-button
                  size="large"
                  :loading="database.run_migration_loading"
                  @click="runMigration()"
                  type="primary"
                >Run migration</a-button>
              </li>
              <li>
                <a-button
                  :loading="database.reverse_migration_loading"
                  @click="reverseMigration()"
                  size="large"
                  type="primary"
                >Reverse back migration</a-button>
              </li>
              <li>
                <a-button
                  size="large"
                  :loading="database.run_seeder_loading"
                  @click="runSeeder()"
                  type="primary"
                >Run seeder</a-button>
              </li>
              <li>
                <a-button
                  size="large"
                  :loading="database.reverse_seeder_loading"
                  @click="reverseSeeder()"
                  type="primary"
                >Reverse back seeder</a-button>
              </li>
            </ul>
          </a-col>
          <a-col :span="16">
            <a-row>
              <!-- Console -->
              <a-col :span="24">
                <div
                  class="dev-console"
                  v-chat-scroll="{always: false, smooth: true, scrollonremoved:false}"
                >
                  <code>console: ~ wecodefy</code>
                  <br />
                  <div v-for="(item,index) in database.console" :key="index+'database'">
                    <div v-if="item.status == 'success'">
                      <span style="color:green;font-size:10px" class>{{item.message}}</span>
                      <br />-------
                    </div>
                    <div v-if="item.status == 'fail'">
                      <span style="color:red;font-size:10px" class>{{item.message}}</span>
                      <br />-------
                    </div>
                  </div>

                  <span class="type-cursor">|</span>
                </div>
              </a-col>
            </a-row>
          </a-col>
        </a-row>
      </div>
    </div>
    <!-- end -->
    <!-- Angular panel -->
    <div class="dev-options-panel" v-show="selected_panel == 'Angular'">
      <div class="dev-task">
        <a-row>
          <a-col :span="8">
            <ul>
              <li>
                <a-button
                  size="large"
                  :loading="angular.generate_component_loading"
                  @click="generateComponent()"
                  type="primary"
                >Generate component</a-button>
              </li>
              <li>
                <a-button
                  :loading="angular.generate_service_loading"
                  @click="generateService()"
                  size="large"
                  type="primary"
                >Generate service</a-button>
              </li>
            </ul>
          </a-col>
          <a-col :span="16">
            <a-row :gutter="16" type="flex" justify="end">
              <a-col :span="24">
                <a-row>
                  <!-- Name -->
                  <a-col :span="12">
                    <a-input placeholder="Enter name" v-model="angular.name" size="large">
                      <a-icon slot="prefix" type="file" />
                    </a-input>
                  </a-col>
                </a-row>
              </a-col>
            </a-row>
            <a-row>
              <!-- Console -->
              <a-col :span="24">
                <div
                  class="dev-console"
                  v-chat-scroll="{always: false, smooth: true, scrollonremoved:false}"
                >
                  <code>console: ~ wecodefy</code>
                  <br />
                  <div v-for="(item,index) in angular.console" :key="index+'angular'">
                    <div v-if="item.status == 'success'">
                      <span style="color:green;font-size:10px" class>{{item.message}}</span>
                      <br />-------
                    </div>
                    <div v-if="item.status == 'fail'">
                      <span style="color:red;font-size:10px" class>{{item.message}}</span>
                      <br />-------
                    </div>
                  </div>

                  <span class="type-cursor">|</span>
                </div>
              </a-col>
            </a-row>
          </a-col>
        </a-row>
      </div>
    </div>
    <!-- end -->
    <!-- Vue panel -->
    <div class="dev-options-panel" v-show="selected_panel == 'Vue'">
      <div class="dev-task">
        <a-row>
          <a-col :span="8">
            <ul>
              <li>
                <a-button
                  size="large"
                  :loading="vue.generate_component_loading"
                  @click="generateVueComponent()"
                  type="primary"
                >Generate component</a-button>
              </li>
            </ul>
          </a-col>
          <a-col :span="16">
            <a-row :gutter="16" type="flex" justify="end">
              <a-col :span="24">
                <a-row :gutter="10">
                  <a-col :span="12">
                    <a-input placeholder="Folder name" v-model="vue.folder_name" size="large">
                      <a-icon slot="prefix" type="folder" />
                    </a-input>
                  </a-col>
                  <!-- Name -->
                  <a-col :span="12">
                    <a-input placeholder="Enter name" v-model="vue.file_name" size="large">
                      <a-icon slot="prefix" type="file" />
                    </a-input>
                  </a-col>
                </a-row>
              </a-col>
            </a-row>
            <a-row>
              <!-- Console -->
              <a-col :span="24">
                <div
                  class="dev-console"
                  v-chat-scroll="{always: false, smooth: true, scrollonremoved:false}"
                >
                  <code>console: ~ wecodefy</code>
                  <br />
                  <div v-for="(item,index) in vue.console" :key="index+'vue'">
                    <div v-if="item.status == 'success'">
                      <span style="color:green;font-size:10px" class>{{item.message}}</span>
                      <br />-------
                    </div>
                    <div v-if="item.status == 'fail'">
                      <span style="color:red;font-size:10px" class>{{item.message}}</span>
                      <br />-------
                    </div>
                  </div>

                  <span class="type-cursor">|</span>
                </div>
              </a-col>
            </a-row>
          </a-col>
        </a-row>
      </div>
    </div>
    <!-- end -->
    <!-- React panel -->
    <div class="dev-options-panel" v-show="selected_panel == 'React'">
      <div class="dev-task">
        <a-row>
          <a-col :span="8">
            <ul>
              <li>
                <a-button
                  size="large"
                  :loading="react.generate_component_loading"
                  @click="generateRactComponent()"
                  type="primary"
                >Generate component</a-button>
              </li>
            </ul>
          </a-col>
          <a-col :span="16">
            <a-row :gutter="16" type="flex" justify="end">
              <a-col :span="24">
                <a-row :gutter="10">
                  <a-col :span="12">
                    <a-input placeholder="Folder name" v-model="react.folder_name" size="large">
                      <a-icon slot="prefix" type="folder" />
                    </a-input>
                  </a-col>
                  <!-- Name -->
                  <a-col :span="12">
                    <a-input placeholder="Enter name" v-model="react.file_name" size="large">
                      <a-icon slot="prefix" type="file" />
                    </a-input>
                  </a-col>
                </a-row>
              </a-col>
            </a-row>
            <a-row>
              <!-- Console -->
              <a-col :span="24">
                <div
                  class="dev-console"
                  v-chat-scroll="{always: false, smooth: true, scrollonremoved:false}"
                >
                  <code>console: ~ wecodefy</code>
                  <br />
                  <div v-for="(item,index) in react.console" :key="index+'vue'">
                    <div v-if="item.status == 'success'">
                      <span style="color:green;font-size:10px" class>{{item.message}}</span>
                      <br />-------
                    </div>
                    <div v-if="item.status == 'fail'">
                      <span style="color:red;font-size:10px" class>{{item.message}}</span>
                      <br />-------
                    </div>
                  </div>

                  <span class="type-cursor">|</span>
                </div>
              </a-col>
            </a-row>
          </a-col>
        </a-row>
      </div>
    </div>
    <!-- end -->
    <!-- Build js panel -->
    <div class="dev-options-panel" v-show="selected_panel == 'Build'">
      <div class="dev-task">
        <a-row>
          <a-col :span="8">
            <ul>
              <li>
                <a-button
                  size="large"
                  :loading="build.loading"
                  @click="runBuild()"
                  type="primary"
                >Build js</a-button>
              </li>
            </ul>
          </a-col>
          <a-col :span="16">
            <a-row>
              <!-- Console -->
              <a-col :span="24">
                <div
                  class="dev-console"
                  v-chat-scroll="{always: false, smooth: true, scrollonremoved:false}"
                >
                  <code>console: ~ wecodefy</code>
                  <br />
                  <div v-for="(item,index) in build.console" :key="index+'vue'">
                    <div v-if="item.status == 'success'">
                      <span style="color:green;font-size:10px" class>{{item.message}}</span>
                      <br />-------
                    </div>
                    <div v-if="item.status == 'fail'">
                      <span style="color:red;font-size:10px" class>{{item.message}}</span>
                      <br />-------
                    </div>
                  </div>

                  <span class="type-cursor">|</span>
                </div>
              </a-col>
            </a-row>
          </a-col>
        </a-row>
      </div>
    </div>
    <!-- end -->
  </div>
</template>

<script>
// @ is an alias to /src

export default {
  name: "home",
  components: {},
  data() {
    return {
      selected_panel: "Generate",
      generate: {
        console: [],
        loading: false,
        folder_name: "site",
        class_name: "",
        is: {
          controller: false,
          model: false,
          view: false
        }
      },
      database: {
        console: [],
        run_migration_loading: false,
        reverse_migration_loading: false,
        run_seeder_loading: false,
        reverse_seeder_loading: false
      },
      angular: {
        console: [],
        name: "",
        generate_component_loading: false,
        generate_service_loading: false
      },
      vue: {
        console: [],
        file_name: "",
        folder_name: "components",
        generate_component_loading: false,
        generate_service_loading: false
      },
      react: {
        console: [],
        file_name: "",
        folder_name: "components",
        generate_component_loading: false,
        generate_service_loading: false
      },
      build: {
        console: [],
        loading: false
      }
    };
  },
  methods: {
    onChangePanel(e) {
      let vm = this;
      vm.selected_panel = e.target.value;
    },
    // Allow to genelate controller,view,model
    onGenerate() {
      let vm = this;
      if (vm.generate.folder_name) {
        if (/\s/.test(vm.generate.folder_name) == false) {
          if (vm.generate.class_name) {
            if (/\s/.test(vm.generate.class_name) == false) {
              if (
                vm.generate.is.controller ||
                vm.generate.is.model ||
                vm.generate.is.view
              ) {
                vm.generate.loading = true;
                var form_data = {
                  folder_name: vm.generate.folder_name,
                  class_name: vm.generate.class_name,
                  controller: vm.generate.is.controller,
                  model: vm.generate.is.model,
                  view: vm.generate.is.view
                };
                this.axios
                  .post(vm.$apiUrl("generate"), form_data)
                  .then(response => {
                    vm.generate.loading = false;
                    response.data.forEach(item => {
                      vm.generate.console.push(item);
                    });
                  })
                  .catch(error => {
                    let item = {
                      error: error,
                      status: "fail",
                      message: "Something went wrong, Please Try again"
                    };
                    vm.generate.console.push(item);
                  });
              } else {
                // No type selected
                this.$error({
                  title: "This is an error message",
                  content: "No type selected"
                });
              }
            } else {
              this.$error({
                title: "This is an error message",
                content: "File name contain whitespace"
              });
            }
          } else {
            // file name is empty
            this.$error({
              title: "This is an error message",
              content: "File name filed is empty"
            });
          }
        } else {
          this.$error({
            title: "This is an error message",
            content: "Folder name contain whitespace"
          });
        }
      } else {
        // folder is empty
        this.$error({
          title: "This is an error message",
          content: "Folder name filed is empty"
        });
      }
    },
    // Allow to run migration on database
    runMigration() {
      let vm = this;
      vm.database.run_migration_loading = true;
      this.axios
        .get(vm.$apiUrl("run-migration"))
        .then(response => {
          vm.database.run_migration_loading = false;
          response.data.forEach(item => {
            vm.database.console.push(item);
          });
        })
        .catch(error => {
          let item = {
            error: error,
            status: "fail",
            message: "Something went wrong, Please Try again"
          };
          vm.database.console.push(item);
        });
    },
    //Allow to reverse migration
    reverseMigration() {
      let vm = this;
      vm.reverse_migration_loading = true;
      this.axios
        .get(vm.$apiUrl("reverse-migration"))
        .then(response => {
          vm.reverse_migration_loading = false;
          response.data.forEach(item => {
            vm.database.console.push(item);
          });
        })
        .catch(error => {
          let item = {
            error: error,
            status: "fail",
            message: "Something went wrong, Please Try again"
          };
          vm.database.console.push(item);
        });
    },
    //Run seeder
    runSeeder() {
      let vm = this;
      vm.database.run_seeder_loading = true;
      this.axios
        .get(vm.$apiUrl("run-seeder"))
        .then(response => {
          vm.database.run_seeder_loading = false;
          response.data.forEach(item => {
            vm.database.console.push(item);
          });
        })
        .catch(error => {
          let item = {
            error: error,
            status: "fail",
            message: "Something went wrong, Please Try again"
          };
          vm.database.console.push(item);
        });
    },
    //Allow to reverse seeder
    reverseSeeder() {
      let vm = this;
      vm.reverse_seeder_loading = true;
      vm.axios
        .get(vm.$apiUrl("reverse-seeder"))
        .then(response => {
          vm.database.reverse_seeder_loading = false;
          response.data.forEach(item => {
            vm.database.console.push(item);
          });
        })
        .catch(error => {
          let item = {
            error: error,
            status: "fail",
            message: "Something went wrong, Please Try again"
          };
          vm.database.console.push(item);
        });
    },
    //generate component
    generateComponent() {
      let vm = this;
      if (vm.angular.name) {
        if (/\s/.test(vm.angular.name) == false) {
          vm.angular.generate_component_loading = true;
          let formdata = {
            name: vm.angular.name
          };
          this.axios
            .post(vm.$apiUrl("angular-g-component"), formdata)
            .then(response => {
              vm.angular.generate_component_loading = false;
              response.data.forEach(item => {
                vm.angular.console.push(item);
              });
            })
            .catch(error => {
              let item = {
                error: error,
                status: "fail",
                message: "Something went wrong, Please Try again"
              };
              vm.angular.console.push(item);
            });
        } else {
          this.$error({
            title: "This is an error message",
            content: "Angular component name must not contain whitespace"
          });
        }
      } else {
        // folder is empty
        this.$error({
          title: "This is an error message",
          content: "Angular component name filed is empty"
        });
      }
    },
    //generate service
    generateService() {
      let vm = this;
      if (vm.angular.name) {
        if (/\s/.test(vm.angular.name) == false) {
          vm.angular.generate_service_loading = true;
          let formdata = {
            name: vm.angular.name
          };
          this.axios
            .post(vm.$apiUrl("angular-g-service"), formdata)
            .then(response => {
              vm.angular.generate_service_loading = false;
              response.data.forEach(item => {
                vm.angular.console.push(item);
              });
            })
            .catch(error => {
              let item = {
                error: error,
                status: "fail",
                message: "Something went wrong, Please Try again"
              };
              vm.angular.console.push(item);
            });
        } else {
          this.$error({
            title: "This is an error message",
            content: "Angular service name must not contain whitespace"
          });
        }
      } else {
        // folder is empty
        this.$error({
          title: "This is an error message",
          content: "Angular service name filed is empty"
        });
      }
    },
    // Generate vue component
    generateVueComponent() {
      let vm = this;
      if (vm.vue.folder_name) {
        if (/\s/.test(vm.vue.folder_name) == false) {
          if (vm.vue.file_name) {
            if (/\s/.test(vm.vue.file_name) == false) {
              vm.vue.generate_component_loading = true;
              var form_data = {
                folder_name: vm.vue.folder_name,
                file_name: vm.vue.file_name
              };
              this.axios
                .post(vm.$apiUrl("create-vue-component"), form_data)
                .then(response => {
                  vm.vue.generate_component_loading = false;
                  response.data.forEach(item => {
                    vm.vue.console.push(item);
                  });
                })
                .catch(error => {
                  let item = {
                    error: error,
                    status: "fail",
                    message: "Something went wrong, Please Try again"
                  };
                  vm.vue.console.push(item);
                });
            } else {
              this.$error({
                title: "This is an error message",
                content: "File name contain whitespace"
              });
            }
          } else {
            // file name is empty
            this.$error({
              title: "This is an error message",
              content: "File name filed is empty"
            });
          }
        } else {
          this.$error({
            title: "This is an error message",
            content: "Folder name contain whitespace"
          });
        }
      } else {
        // folder is empty
        this.$error({
          title: "This is an error message",
          content: "Folder name filed is empty"
        });
      }
    },
    // Create react component
    generateRactComponent() {
      let vm = this;
      if (vm.react.folder_name) {
        if (/\s/.test(vm.react.folder_name) == false) {
          if (vm.react.file_name) {
            if (/\s/.test(vm.react.file_name) == false) {
              vm.react.generate_component_loading = true;
              var form_data = {
                folder_name: vm.react.folder_name,
                file_name: vm.react.file_name
              };
              this.axios
                .post(vm.$apiUrl("create-react-component"), form_data)
                .then(response => {
                  vm.react.generate_component_loading = false;
                  response.data.forEach(item => {
                    vm.react.console.push(item);
                  });
                })
                .catch(error => {
                  let item = {
                    error: error,
                    status: "fail",
                    message: "Something went wrong, Please Try again"
                  };
                  vm.react.console.push(item);
                });
            } else {
              this.$error({
                title: "This is an error message",
                content: "File name contain whitespace"
              });
            }
          } else {
            // file name is empty
            this.$error({
              title: "This is an error message",
              content: "File name filed is empty"
            });
          }
        } else {
          this.$error({
            title: "This is an error message",
            content: "Folder name contain whitespace"
          });
        }
      } else {
        // folder is empty
        this.$error({
          title: "This is an error message",
          content: "Folder name filed is empty"
        });
      }
    },
    // Build js
    runBuild() {
      let vm = this;
      vm.build.loading = true;
      this.axios
        .get(vm.$apiUrl("build-js"))
        .then(response => {
          vm.build.loading = false;
          response.data.forEach(item => {
            vm.build.console.push(item);
          });
        })
        .catch(error => {
          let item = {
            error: error,
            status: "fail",
            message: "Something went wrong, Please Try again"
          };
          vm.build.console.push(item);
        });
    }
  }
};
</script>

<style lang="scss" scoped>
.navigation {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 30px;
  img {
    width: 160px;
  }
}
.dev-options {
  display: flex;
  align-items: center;
  justify-content: center;
}
.dev-options-panel {
  margin-top: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  .dev-task {
    width: 800px;
    padding: 20px;
    background: #fdfdfd;
    margin-bottom: 40px;
    box-shadow: 1px 1px 4px #ccc;
    height: 360px;
    ul {
      list-style: none;
      margin-left: -38px;
      li {
        margin-bottom: 20px;
      }
    }
  }
  .dev-console {
    height: 260px;
    background: #000;
    margin-top: 20px;
    padding: 20px;
    color: #fff;
    overflow-y: auto;
    code {
      color: #fff;
      margin-right: 5px;
    }
    .type-cursor {
      color: #fff;
      animation: blinkTextCursor 500ms steps(44) infinite normal;
    }
    @keyframes blinkTextCursor {
      from {
        color: rgba(255, 255, 255, 0.75);
      }
      to {
        color: transparent;
      }
    }
  }
}
</style>
