<template>
    <ckeditor
        :editor="editor"
        v-model="editorData"
        :config="editorConfig"
        @input="onEditorInput"
    ></ckeditor>
</template>

<script>
import CKEditor from "@ckeditor/ckeditor5-vue";
import "@ckeditor/ckeditor5-build-classic/build/translations/es";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
//import UploadAdapter from '../utilities/UploadAdapter'
class UploadAdapter {
    constructor(loader, url) {
        this.loader = loader;
        this.url = url;
    }
    upload() {
        return this.loader.file.then(
            file =>
                new Promise((resolve, reject) => {
                    const data = new FormData();
                    data.append("nombre", "un nombre");
                    data.append("archivo", file);

                    axios
                        .post(this.url, data)
                        .then(response => {
                            resolve({
                                default:
                                    Laravel.baseUrl +
                                    "/images/grande/" +
                                    response.data.archivo
                            });
                        })
                        .catch(error => {
                            reject(error);
                        });
                })
        );
    }
    abort() {
        // Se maneja la exception desde el upload
    }
}

function UploadAdapterPlugin(editor) {
    editor.plugins.get("FileRepository").createUploadAdapter = loader => {
        return new UploadAdapter(loader, route("uploadArchivoPagina"));
    };
}

export default {
    components: {
        ckeditor: CKEditor.component
    },
    name: "Editor",
    props: {
        contenido: { default: "" },
        url: { default: "" },
        tipo: { default: "full" }
    },
    data() {
        return {
            editorData: "",
            editor: ClassicEditor,
            editorConfig: {
                extraPlugins: [UploadAdapterPlugin],
                toolbar:
                    this.tipo == "basico"
                        ? [
                              "bold",
                              "italic",
                              "bulletedList",
                              "numberedList",
                              "blockQuote"
                          ]
                        : [
                              "heading",
                              "|",
                              "bold",
                              "italic",
                              "link",
                              "bulletedList",
                              "numberedList",
                              "imageUpload",
                              "blockQuote",
                              "insertTable",
                              "undo",
                              "redo"
                          ],
                language: "es",
                image: {
                    toolbar: [
                        "imageTextAlternative",
                        "|",
                        "imageStyle:alignLeft",
                        "imageStyle:full",
                        "imageStyle:alignRight"
                    ],
                    styles: ["full", "alignLeft", "alignRight"]
                }
            }
        };
    },
    methods: {
        onEditorInput() {
            this.$emit("update:contenido", this.editorData);
        },
        updateContenido() {
            this.editorData = this.contenido;
        }
        // UploadAdapter(editor) {
        //     editor.plugins.get( 'FileRepository' ).createUploadAdapter = (loader) => {
        //         return new UploadAdapter( loader, this.route);
        //     };
        // },
    },
    created() {
        this.updateContenido();
    }
};
</script>

<style>
.ck.ck-content ul {
    padding-left: 4.5rem;
}
.ck.ck-content ul li {
    list-style: disc;
}
</style>
