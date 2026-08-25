<script setup lang="ts">
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import Heading from '@/components/Heading.vue';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import {
    Dialog,
    DialogClose,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
} from '@/components/ui/dialog';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import { Plus, Edit, Trash2, ExternalLink } from '@lucide/vue';
import { index as newsIndex, store as newsStore, update as newsUpdate, destroy as newsDestroy } from '@/routes/news';
import WysiwygEditor from '@/components/WysiwygEditor.vue';

interface NewsItem {
    id: number;
    title: string;
    slug: string;
    content: string;
    created_at: string;
    updated_at: string;
}

const props = defineProps<{
    news: NewsItem[];
}>();

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Новини',
                href: newsIndex(),
            },
        ],
    },
});

// Create News State
const isCreateOpen = ref(false);
const createForm = useForm({
    title: '',
    content: '',
});

const submitCreate = () => {
    createForm.post(newsStore().url, {
        preserveScroll: true,
        onSuccess: () => {
            createForm.reset();
            isCreateOpen.value = false;
        },
    });
};

// Edit News State
const isEditOpen = ref(false);
const currentEditItem = ref<NewsItem | null>(null);
const editForm = useForm({
    title: '',
    content: '',
});

const openEditModal = (item: NewsItem) => {
    currentEditItem.value = item;
    editForm.title = item.title;
    editForm.content = item.content;
    isEditOpen.value = true;
};

const submitEdit = () => {
    if (!currentEditItem.value) return;
    editForm.put(newsUpdate(currentEditItem.value.id).url, {
        preserveScroll: true,
        onSuccess: () => {
            editForm.reset();
            isEditOpen.value = false;
            currentEditItem.value = null;
        },
    });
};

// Delete News State
const isDeleteOpen = ref(false);
const currentDeleteItem = ref<NewsItem | null>(null);
const deleteForm = useForm({});

const openDeleteModal = (item: NewsItem) => {
    currentDeleteItem.value = item;
    isDeleteOpen.value = true;
};

const executeDelete = () => {
    if (!currentDeleteItem.value) return;
    deleteForm.delete(newsDestroy(currentDeleteItem.value.id).url, {
        preserveScroll: true,
        onSuccess: () => {
            isDeleteOpen.value = false;
            currentDeleteItem.value = null;
        },
    });
};

// Date Formatter
const formatDate = (dateStr: string) => {
    return new Date(dateStr).toLocaleDateString('bg-BG', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
    });
};

// HTML Strip Utility for plain-text preview
const stripHtml = (html: string) => {
    if (!html) return '';
    return html.replace(/<[^>]*>/g, '');
};
</script>

<template>
    <Head title="Новини" />

    <div class="flex flex-col space-y-6 w-full p-6 max-w-7xl mx-auto">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <Heading
                variant="small"
                title="Новини"
                description="Счетоводни и корпоративни новини за нашите клиенти"
            />
            <Button @click="isCreateOpen = true" class="w-full sm:w-auto gap-2 cursor-pointer">
                <Plus class="h-4 w-4" />
                Добави новина
            </Button>
        </div>

        <div v-if="props.news.length === 0" class="flex flex-col items-center justify-center border border-dashed border-neutral-300 dark:border-neutral-800 rounded-xl p-16 text-center space-y-4 bg-white dark:bg-neutral-900/50">
            <div class="p-4 bg-neutral-100 dark:bg-neutral-800 rounded-full text-neutral-500">
                <Plus class="h-8 w-8" />
            </div>
            <div class="space-y-1">
                <h3 class="font-semibold text-lg">Няма добавени новини</h3>
                <p class="text-sm text-muted-foreground">Създайте първата си новина, за да се появи тук.</p>
            </div>
            <Button @click="isCreateOpen = true" class="cursor-pointer">
                Добави първата новина
            </Button>
        </div>

        <div v-else class="overflow-x-auto rounded-xl border border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-900 shadow-xs">
            <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-800 text-left text-sm">
                <thead class="bg-neutral-50 dark:bg-neutral-800/50 text-2xs font-semibold text-neutral-500 uppercase tracking-wider">
                    <tr>
                        <th scope="col" class="px-6 py-4">Заглавие</th>
                        <th scope="col" class="px-6 py-4">Съдържание</th>
                        <th scope="col" class="px-6 py-4">Дата на създаване</th>
                        <th scope="col" class="px-6 py-4 text-right">Действия</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-200 dark:divide-neutral-800">
                    <tr v-for="item in props.news" :key="item.id" class="hover:bg-neutral-50/50 dark:hover:bg-neutral-800/20 transition-colors">
                        <td class="px-6 py-4 font-medium text-neutral-900 dark:text-white max-w-xs truncate">
                            {{ item.title }}
                        </td>
                        <td class="px-6 py-4 text-neutral-500 dark:text-neutral-400 max-w-md truncate">
                            {{ stripHtml(item.content) }}
                        </td>
                        <td class="px-6 py-4 text-neutral-500 dark:text-neutral-400 whitespace-nowrap">
                            {{ formatDate(item.created_at) }}
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap">
                            <div class="flex items-center justify-end gap-2">
                                <a
                                    :href="'/news/' + item.slug"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 hover:bg-neutral-100 dark:hover:bg-neutral-800 text-neutral-500 hover:text-neutral-950 dark:hover:text-white h-8 w-8 cursor-pointer"
                                    title="Преглед в сайта"
                                >
                                    <ExternalLink class="h-4 w-4" />
                                </a>
                                <Button
                                    variant="ghost"
                                    size="icon"
                                    class="h-8 w-8 text-neutral-500 hover:text-neutral-950 dark:hover:text-white cursor-pointer"
                                    @click="openEditModal(item)"
                                    title="Редактирай"
                                >
                                    <Edit class="h-4 w-4" />
                                </Button>
                                <Button
                                    variant="ghost"
                                    size="icon"
                                    class="h-8 w-8 text-red-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-950/20 cursor-pointer"
                                    @click="openDeleteModal(item)"
                                    title="Изтрий"
                                >
                                    <Trash2 class="h-4 w-4" />
                                </Button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Create News Modal -->
        <Dialog v-model:open="isCreateOpen">
            <DialogContent class="sm:max-w-xl">
                <form @submit.prevent="submitCreate" class="space-y-4">
                    <DialogHeader>
                        <DialogTitle>Добави новина</DialogTitle>
                        <DialogDescription>
                            Въведете заглавие и съдържание за новата публикация.
                        </DialogDescription>
                    </DialogHeader>

                    <div class="space-y-4 py-2">
                        <div class="grid gap-2">
                            <Label for="title">Заглавие</Label>
                            <Input
                                id="title"
                                v-model="createForm.title"
                                type="text"
                                required
                                placeholder="Въведете заглавие..."
                            />
                            <InputError :message="createForm.errors.title" />
                        </div>

                        <div class="grid gap-2">
                            <Label for="content">Съдържание</Label>
                            <WysiwygEditor v-model="createForm.content" />
                            <InputError :message="createForm.errors.content" />
                        </div>
                    </div>

                    <DialogFooter class="gap-2 mt-6">
                        <DialogClose as-child>
                            <Button type="button" variant="outline" class="cursor-pointer">Отказ</Button>
                        </DialogClose>
                        <Button type="submit" :disabled="createForm.processing" class="cursor-pointer">
                            <Spinner v-if="createForm.processing" class="mr-2" />
                            Добави
                        </Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>

        <!-- Edit News Modal -->
        <Dialog v-model:open="isEditOpen">
            <DialogContent class="sm:max-w-xl">
                <form @submit.prevent="submitEdit" class="space-y-4">
                    <DialogHeader>
                        <DialogTitle>Редактирай новина</DialogTitle>
                        <DialogDescription>
                            Редактирайте заглавието и съдържанието на публикацията.
                        </DialogDescription>
                    </DialogHeader>

                    <div class="space-y-4 py-2">
                        <div class="grid gap-2">
                            <Label for="edit_title">Заглавие</Label>
                            <Input
                                id="edit_title"
                                v-model="editForm.title"
                                type="text"
                                required
                                placeholder="Въведете заглавие..."
                            />
                            <InputError :message="editForm.errors.title" />
                        </div>

                        <div class="grid gap-2">
                            <Label for="edit_content">Съдържание</Label>
                            <WysiwygEditor v-model="editForm.content" />
                            <InputError :message="editForm.errors.content" />
                        </div>
                    </div>

                    <DialogFooter class="gap-2 mt-6">
                        <DialogClose as-child>
                            <Button type="button" variant="outline" class="cursor-pointer">Отказ</Button>
                        </DialogClose>
                        <Button type="submit" :disabled="editForm.processing" class="cursor-pointer">
                            <Spinner v-if="editForm.processing" class="mr-2" />
                            Запази
                        </Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>

        <!-- Delete News Confirmation Modal -->
        <Dialog v-model:open="isDeleteOpen">
            <DialogContent class="sm:max-w-md">
                <DialogHeader class="space-y-2">
                    <DialogTitle>Потвърждение за изтриване</DialogTitle>
                    <DialogDescription>
                        Сигурни ли сте, че искате да изтриете тази новина? Това действие е необратимо.
                    </DialogDescription>
                </DialogHeader>
                <DialogFooter class="gap-2">
                    <DialogClose as-child>
                        <Button type="button" variant="outline" class="cursor-pointer">
                            Отказ
                        </Button>
                    </DialogClose>
                    <Button
                        type="button"
                        variant="destructive"
                        class="bg-red-600 hover:bg-red-700 text-white cursor-pointer"
                        :disabled="deleteForm.processing"
                        @click="executeDelete"
                    >
                        <Spinner v-if="deleteForm.processing" class="mr-2" />
                        Изтрий
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>
    </div>
</template>
