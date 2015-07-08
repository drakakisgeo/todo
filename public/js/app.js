Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
new Vue({
    el:'#tasksblock',
    data:{
        newTask:''
    },
    ready: function(){
        this.fetchTasks();
        this.$$.taskfield.focus();
    },

    methods:{
        fetchTasks:function(){
            this.$http.get('/taskslist',function(tasks){
                this.$set('tasks',tasks);
            })
        },

        addTask:function(e){
            e.preventDefault();
            this.storeTask(this.newTask);
        },
        storeTask:function(){
            var taskname = {
                task:this.newTask
            };

            this.$http.post('/tasks',taskname,function(tasks){
                this.$set('tasks',tasks);
            });

            this.newTask = '';
            this.$$.taskfield.focus();

        },

        editTask:function(taskitem){
            this.removeTask(taskitem);
            this.newTask = taskitem.task;
            this.$$.taskfield.focus();
        },

        taskAction:function(task){
            task.status==0 ? task.status=1 : task.status = 0;
            if(task.status){
               // complete it
               this.completeTask(task);
            }else{
                // restore it
                this.restoreTask(task);
            }
        },
        completeTask:function(task){
            this.$http.post('/statuschanger/'+task.id+'/1',function(tasks){
                this.$set('tasks',tasks);
            });
        },
        restoreTask:function(task){
            this.$http.post('/statuschanger/'+task.id+'/0',function(tasks){
                this.$set('tasks',tasks);
            });
        },
        removeTask:function(taskitem){
            this.$http.post('/deletetask/'+taskitem.id,this.newTask,function(tasks){
                this.$set('tasks',tasks);
            });
        }

    }

})