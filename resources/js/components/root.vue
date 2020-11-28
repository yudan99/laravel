
<!--<template>-->
<!--    &lt;!&ndash; bidirectional data binding（双向数据绑定） &ndash;&gt;-->
<!--    <quill-editor v-model="content"-->
<!--                  ref="myQuillEditor"-->
<!--                  :options="editorOption"-->
<!--                  @blur="onEditorBlur($event)"-->
<!--                  @focus="onEditorFocus($event)"-->
<!--                  @ready="onEditorReady($event)">-->
<!--    </quill-editor>-->

<!--&lt;!&ndash;    &lt;!&ndash; Or manually control the data synchronization（或手动控制数据流） &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;    <quill-editor :content="content"&ndash;&gt;-->
<!--&lt;!&ndash;                  :options="editorOption"&ndash;&gt;-->
<!--&lt;!&ndash;                  @change="onEditorChange($event)">&ndash;&gt;-->
<!--&lt;!&ndash;    </quill-editor>&ndash;&gt;-->
<!--</template>-->

<template>
    <div class="quill-wrap">
        <quill-editor
            v-model="content"
            ref="myQuillEditor"
            :options="editorOption"
        >
        </quill-editor>
    </div>
</template>

<script>
    import {quillEditor, Quill} from 'vue-quill-editor'
    import {container, ImageExtend, QuillWatch} from 'quill-image-extend-module'

    Quill.register('modules/ImageExtend', ImageExtend)
    export default {
        components: {quillEditor},
        data() {
            return {
                content: '',
                // 富文本框参数设置
                editorOption: {
                    modules: {
                        ImageExtend: {
                            loading: true,
                            name: 'img',
                            action: updateUrl,
                            response: (res) => {
                                return res.info
                            }
                        },
                        toolbar: {
                            container: container,
                            handlers: {
                                'image': function () {
                                    QuillWatch.emit(this.quill.id)
                                }
                            }
                        }
                    }
                }
            }
        }
    }
</script>

<!--<script>-->

<!--    // you can also register quill modules in the component-->
<!--    // import Quill from 'quill'-->
<!--    // import { someModule } from '../yourModulePath/someQuillModule.js'-->
<!--    // Quill.register('modules/someModule', someModule)-->

<!--    export default {-->
<!--        data () {-->
<!--            return {-->
<!--                content: '<h2>I am Example</h2>',-->
<!--                editorOption: {-->
<!--                    // some quill options-->
<!--                }-->
<!--            }-->
<!--        },-->
<!--        // manually control the data synchronization-->
<!--        // 如果需要手动控制数据同步，父组件需要显式地处理changed事件-->
<!--        methods: {-->
<!--            onEditorBlur(quill) {-->
<!--                console.log('editor blur!', quill)-->
<!--            },-->
<!--            onEditorFocus(quill) {-->
<!--                console.log('editor focus!', quill)-->
<!--            },-->
<!--            onEditorReady(quill) {-->
<!--                console.log('editor ready!', quill)-->
<!--            },-->
<!--            onEditorChange({ quill, html, text }) {-->
<!--                console.log('editor change!', quill, html, text)-->
<!--                this.content = html-->
<!--            }-->
<!--        },-->
<!--        computed: {-->
<!--            editor() {-->
<!--                return this.$refs.myQuillEditor.quill-->
<!--            }-->
<!--        },-->
<!--        mounted() {-->
<!--            console.log('this is current quill instance object', this.editor)-->
<!--        }-->
<!--    }-->
<!--</script>-->


<!--<template>-->
<!--    <div>-->
<!--        <h1>Hello, Larvuent!</h1>-->
<!--        <p class="hello">{{ msg }}</p>-->
<!--    </div>-->
<!--</template>-->

<!--<script>-->
<!--    export default {-->
<!--        data() {-->
<!--            return {-->
<!--                msg: 'This is a Laravel with Vue and Element Demo.'-->
<!--            }-->
<!--        }-->
<!--    }-->
<!--</script>-->

<!--<style>-->
<!--    .hello {-->
<!--        font-size: 2em;-->
<!--        color: green;-->
<!--    }-->
<!--</style>-->
