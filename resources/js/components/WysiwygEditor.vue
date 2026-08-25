<script setup lang="ts">
import { useEditor, EditorContent } from '@tiptap/vue-3';
import StarterKit from '@tiptap/starter-kit';
import Underline from '@tiptap/extension-underline';
import { Bold, Italic, Underline as UnderlineIcon, List, ListOrdered } from '@lucide/vue';
import { watch } from 'vue';

const props = defineProps<{
    modelValue: string;
    placeholder?: string;
}>();

const emit = defineEmits<{
    (e: 'update:modelValue', value: string): void;
}>();

const editor = useEditor({
    content: props.modelValue,
    extensions: [
        StarterKit,
        Underline,
    ],
    onUpdate: ({ editor }) => {
        emit('update:modelValue', editor.getHTML());
    },
    editorProps: {
        attributes: {
            class: 'min-h-[150px] max-h-[300px] overflow-y-auto w-full rounded-b-md border border-t-0 border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 max-w-none focus:outline-none',
        },
    },
});

watch(() => props.modelValue, (value) => {
    const isSame = editor.value?.getHTML() === value;
    if (isSame) return;
    editor.value?.commands.setContent(value || '', false);
});
</script>

<template>
    <div class="flex flex-col w-full rounded-md border border-input focus-within:ring-2 focus-within:ring-ring focus-within:ring-offset-2">
        <!-- Toolbar -->
        <div v-if="editor" class="flex items-center gap-1 p-1 bg-neutral-50 dark:bg-neutral-800 border-b border-input rounded-t-md">
            <button
                type="button"
                @click="editor.chain().focus().toggleBold().run()"
                :class="[
                    'p-1.5 rounded-md text-neutral-600 dark:text-neutral-300 hover:bg-neutral-200 dark:hover:bg-neutral-700 cursor-pointer transition-colors',
                    editor.isActive('bold') ? 'bg-neutral-200 dark:bg-neutral-700 text-neutral-900 dark:text-white font-bold' : ''
                ]"
                title="Удебелен (Bold)"
            >
                <Bold class="h-4 w-4" />
            </button>
            <button
                type="button"
                @click="editor.chain().focus().toggleItalic().run()"
                :class="[
                    'p-1.5 rounded-md text-neutral-600 dark:text-neutral-300 hover:bg-neutral-200 dark:hover:bg-neutral-700 cursor-pointer transition-colors',
                    editor.isActive('italic') ? 'bg-neutral-200 dark:bg-neutral-700 text-neutral-900 dark:text-white' : ''
                ]"
                title="Курсив (Italic)"
            >
                <Italic class="h-4 w-4" />
            </button>
            <button
                type="button"
                @click="editor.chain().focus().toggleUnderline().run()"
                :class="[
                    'p-1.5 rounded-md text-neutral-600 dark:text-neutral-300 hover:bg-neutral-200 dark:hover:bg-neutral-700 cursor-pointer transition-colors',
                    editor.isActive('underline') ? 'bg-neutral-200 dark:bg-neutral-700 text-neutral-900 dark:text-white' : ''
                ]"
                title="Подчертан (Underline)"
            >
                <UnderlineIcon class="h-4 w-4" />
            </button>

            <!-- Divider -->
            <div class="h-5 w-px bg-neutral-300 dark:bg-neutral-600 mx-1"></div>

            <button
                type="button"
                @click="editor.chain().focus().toggleBulletList().run()"
                :class="[
                    'p-1.5 rounded-md text-neutral-600 dark:text-neutral-300 hover:bg-neutral-200 dark:hover:bg-neutral-700 cursor-pointer transition-colors',
                    editor.isActive('bulletList') ? 'bg-neutral-200 dark:bg-neutral-700 text-neutral-900 dark:text-white' : ''
                ]"
                title="Списък с точки (Bullet List)"
            >
                <List class="h-4 w-4" />
            </button>
            <button
                type="button"
                @click="editor.chain().focus().toggleOrderedList().run()"
                :class="[
                    'p-1.5 rounded-md text-neutral-600 dark:text-neutral-300 hover:bg-neutral-200 dark:hover:bg-neutral-700 cursor-pointer transition-colors',
                    editor.isActive('orderedList') ? 'bg-neutral-200 dark:bg-neutral-700 text-neutral-900 dark:text-white' : ''
                ]"
                title="Номериран списък (Ordered List)"
            >
                <ListOrdered class="h-4 w-4" />
            </button>
        </div>

        <!-- Editor Area -->
        <EditorContent :editor="editor" />
    </div>
</template>

<style scoped>
:deep(.ProseMirror) {
    min-height: 150px;
    max-height: 300px;
    outline: none !important;
}
:deep(.ProseMirror ul) {
    list-style-type: disc;
    padding-left: 1.25rem;
    margin-top: 0.5rem;
    margin-bottom: 0.5rem;
}
:deep(.ProseMirror ol) {
    list-style-type: decimal;
    padding-left: 1.25rem;
    margin-top: 0.5rem;
    margin-bottom: 0.5rem;
}
:deep(.ProseMirror p) {
    margin-top: 0.5rem;
    margin-bottom: 0.5rem;
}
</style>
