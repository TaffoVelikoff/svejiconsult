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
import { dashboard } from '@/routes';

const props = defineProps<{
    settings: {
        site_title?: string;
        company_name?: string;
        email?: string;
        activity?: string;
        phone?: string;
        working_hours?: string;
        address?: string;
        intro_badge?: string;
        intro_heading?: string;
        intro_description?: string;
        about_heading?: string;
        about_description?: string;
        about_card_1_emoji?: string;
        about_card_1_title?: string;
        about_card_1_text?: string;
        about_card_2_emoji?: string;
        about_card_2_title?: string;
        about_card_2_text?: string;
        about_card_3_emoji?: string;
        about_card_3_title?: string;
        about_card_3_text?: string;
        about_card_4_emoji?: string;
        about_card_4_title?: string;
        about_card_4_text?: string;
        advantages_badge?: string;
        advantages_heading?: string;
        advantages_description?: string;
        advantages_card_1_emoji?: string;
        advantages_card_1_title?: string;
        advantages_card_1_text?: string;
        advantages_card_2_emoji?: string;
        advantages_card_2_title?: string;
        advantages_card_2_text?: string;
        advantages_card_3_emoji?: string;
        advantages_card_3_title?: string;
        advantages_card_3_text?: string;
        advantages_card_4_emoji?: string;
        advantages_card_4_title?: string;
        advantages_card_4_text?: string;
        stats_1_value?: string;
        stats_1_label?: string;
        stats_2_value?: string;
        stats_2_label?: string;
        stats_3_value?: string;
        stats_3_label?: string;
        stats_4_value?: string;
        stats_4_label?: string;
        services_heading?: string;
        services_description?: string;
        services_item_1_emoji?: string;
        services_item_1_title?: string;
        services_item_1_description?: string;
        services_item_1_list?: string;
        services_item_2_emoji?: string;
        services_item_2_title?: string;
        services_item_2_description?: string;
        services_item_2_list?: string;
        services_item_3_emoji?: string;
        services_item_3_title?: string;
        services_item_3_description?: string;
        services_item_3_list?: string;
        services_item_4_emoji?: string;
        services_item_4_title?: string;
        services_item_4_description?: string;
        services_item_4_list?: string;
        services_item_5_emoji?: string;
        services_item_5_title?: string;
        services_item_5_description?: string;
        services_item_5_list?: string;
        process_badge?: string;
        process_heading?: string;
        process_description?: string;
        process_step_1_title?: string;
        process_step_1_description?: string;
        process_step_2_title?: string;
        process_step_2_description?: string;
        process_step_3_title?: string;
        process_step_3_description?: string;
        process_step_4_title?: string;
        process_step_4_description?: string;
        faq_heading?: string;
        faq_description?: string;
        faq_items?: Array<{ question: string; answer: string }>;
    };
}>();

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Настройки',
                href: dashboard(),
            },
        ],
    },
});

const form = useForm({
    site_title: props.settings.site_title || '',
    company_name: props.settings.company_name || '',
    email: props.settings.email || '',
    activity: props.settings.activity || '',
    phone: props.settings.phone || '',
    working_hours: props.settings.working_hours || '',
    address: props.settings.address || '',
    intro_badge: props.settings.intro_badge || '',
    intro_heading: props.settings.intro_heading || '',
    intro_description: props.settings.intro_description || '',
    about_heading: props.settings.about_heading || '',
    about_description: props.settings.about_description || '',
    about_card_1_emoji: props.settings.about_card_1_emoji || '📊',
    about_card_1_title: props.settings.about_card_1_title || '',
    about_card_1_text: props.settings.about_card_1_text || '',
    about_card_2_emoji: props.settings.about_card_2_emoji || '🔒',
    about_card_2_title: props.settings.about_card_2_title || '',
    about_card_2_text: props.settings.about_card_2_text || '',
    about_card_3_emoji: props.settings.about_card_3_emoji || '🤝',
    about_card_3_title: props.settings.about_card_3_title || '',
    about_card_3_text: props.settings.about_card_3_text || '',
    about_card_4_emoji: props.settings.about_card_4_emoji || '⚖️',
    about_card_4_title: props.settings.about_card_4_title || '',
    about_card_4_text: props.settings.about_card_4_text || '',
    advantages_badge: props.settings.advantages_badge || '',
    advantages_heading: props.settings.advantages_heading || '',
    advantages_description: props.settings.advantages_description || '',
    advantages_card_1_emoji: props.settings.advantages_card_1_emoji || '⏱️',
    advantages_card_1_title: props.settings.advantages_card_1_title || '',
    advantages_card_1_text: props.settings.advantages_card_1_text || '',
    advantages_card_2_emoji: props.settings.advantages_card_2_emoji || '💻',
    advantages_card_2_title: props.settings.advantages_card_2_title || '',
    advantages_card_2_text: props.settings.advantages_card_2_text || '',
    advantages_card_3_emoji: props.settings.advantages_card_3_emoji || '📈',
    advantages_card_3_title: props.settings.advantages_card_3_title || '',
    advantages_card_3_text: props.settings.advantages_card_3_text || '',
    advantages_card_4_emoji: props.settings.advantages_card_4_emoji || '👥',
    advantages_card_4_title: props.settings.advantages_card_4_title || '',
    advantages_card_4_text: props.settings.advantages_card_4_text || '',
    stats_1_value: props.settings.stats_1_value || '100%',
    stats_1_label: props.settings.stats_1_label || '',
    stats_2_value: props.settings.stats_2_value || '24/7',
    stats_2_label: props.settings.stats_2_label || '',
    stats_3_value: props.settings.stats_3_value || '100%',
    stats_3_label: props.settings.stats_3_label || '',
    stats_4_value: props.settings.stats_4_value || 'SJC',
    stats_4_label: props.settings.stats_4_label || '',
    services_heading: props.settings.services_heading || '',
    services_description: props.settings.services_description || '',
    services_item_1_emoji: props.settings.services_item_1_emoji || '📊',
    services_item_1_title: props.settings.services_item_1_title || '',
    services_item_1_description: props.settings.services_item_1_description || '',
    services_item_1_list: props.settings.services_item_1_list || '',
    services_item_2_emoji: props.settings.services_item_2_emoji || '👥',
    services_item_2_title: props.settings.services_item_2_title || '',
    services_item_2_description: props.settings.services_item_2_description || '',
    services_item_2_list: props.settings.services_item_2_list || '',
    services_item_3_emoji: props.settings.services_item_3_emoji || '💰',
    services_item_3_title: props.settings.services_item_3_title || '',
    services_item_3_description: props.settings.services_item_3_description || '',
    services_item_3_list: props.settings.services_item_3_list || '',
    services_item_4_emoji: props.settings.services_item_4_emoji || '📑',
    services_item_4_title: props.settings.services_item_4_title || '',
    services_item_4_description: props.settings.services_item_4_description || '',
    services_item_4_list: props.settings.services_item_4_list || '',
    services_item_5_emoji: props.settings.services_item_5_emoji || '🏢',
    services_item_5_title: props.settings.services_item_5_title || '',
    services_item_5_description: props.settings.services_item_5_description || '',
    services_item_5_list: props.settings.services_item_5_list || '',
    process_badge: props.settings.process_badge || '',
    process_heading: props.settings.process_heading || '',
    process_description: props.settings.process_description || '',
    process_step_1_title: props.settings.process_step_1_title || '',
    process_step_1_description: props.settings.process_step_1_description || '',
    process_step_2_title: props.settings.process_step_2_title || '',
    process_step_2_description: props.settings.process_step_2_description || '',
    process_step_3_title: props.settings.process_step_3_title || '',
    process_step_3_description: props.settings.process_step_3_description || '',
    process_step_4_title: props.settings.process_step_4_title || '',
    process_step_4_description: props.settings.process_step_4_description || '',
    faq_heading: props.settings.faq_heading || 'Често задавани въпроси',
    faq_description: props.settings.faq_description || 'Отговори на най-често задаваните въпроси.',
    faq_items: props.settings.faq_items && props.settings.faq_items.length > 0
        ? props.settings.faq_items.map((item) => ({ question: item.question || '', answer: item.answer || '' }))
        : [
            { question: 'Работите ли с малки фирми и стартиращ бизнес?', answer: 'Да. Предлагаме услуги както за новосъздадени дружества, така и за вече развити компании.' },
            { question: 'Може ли документите да се изпращат електронно?', answer: 'Да. Работим с електронен обмен на информация, което улеснява клиентите и спестява време.' },
            { question: 'Предлагате ли услуги по регистрация на фирма?', answer: 'Да. Съдействаме при регистрация на ЕООД, ООД и свободни професии.' },
            { question: 'Как да започнем работа с Вас?', answer: 'Свържете се с нас по телефон или имейл, за да обсъдим Вашите нужди.' },
        ],
});

const addFaqItem = () => {
    form.faq_items.push({
        question: '',
        answer: '',
    });
};

const itemToDeleteIndex = ref<number | null>(null);
const isDeleteDialogOpen = ref(false);

const confirmDeleteFaqItem = (index: number) => {
    itemToDeleteIndex.value = index;
    isDeleteDialogOpen.value = true;
};

const executeDeleteFaqItem = () => {
    if (itemToDeleteIndex.value !== null) {
        form.faq_items.splice(itemToDeleteIndex.value, 1);
        itemToDeleteIndex.value = null;
    }
    isDeleteDialogOpen.value = false;
};

const removeFaqItem = (index: number) => {
    confirmDeleteFaqItem(index);
};

const moveFaqItem = (index: number, direction: 'up' | 'down') => {
    const targetIndex = direction === 'up' ? index - 1 : index + 1;
    if (targetIndex < 0 || targetIndex >= form.faq_items.length) return;
    const temp = form.faq_items[index];
    form.faq_items[index] = form.faq_items[targetIndex];
    form.faq_items[targetIndex] = temp;
};

const formAny = form as Record<string, any>;

const submit = () => {
    form.put(dashboard().url, {
        preserveScroll: true,
    });
};
</script>

<template>
    <Head title="Настройки" />

    <div class="flex flex-col space-y-8 w-full p-6">
        <Heading
            variant="small"
            title="Основни"
            description="Управление на основните настройки на уебсайта и контактната информация"
        />

        <form @submit.prevent="submit" class="space-y-6">
            <div class="grid gap-6 md:grid-cols-2">
                <!-- Left Column -->
                <div class="space-y-6">
                    <div class="grid gap-2">
                        <Label for="site_title">Заглавие на уебсайт (Title)</Label>
                        <Input
                            id="site_title"
                            v-model="form.site_title"
                            type="text"
                            required
                            placeholder="Свежи Консулт ЕООД | Счетоводни услуги в Добрич"
                        />
                        <InputError :message="form.errors.site_title" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="company_name">Име на компания</Label>
                        <Input
                            id="company_name"
                            v-model="form.company_name"
                            type="text"
                            required
                            placeholder="Свежи Консулт"
                        />
                        <InputError :message="form.errors.company_name" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="email">Имейл</Label>
                        <Input
                            id="email"
                            v-model="form.email"
                            type="email"
                            required
                            placeholder="svejiconsult@abv.bg"
                        />
                        <InputError :message="form.errors.email" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="activity">Дейност</Label>
                        <Input
                            id="activity"
                            v-model="form.activity"
                            type="text"
                            placeholder="Счетоводни и данъчни услуги"
                        />
                        <InputError :message="form.errors.activity" />
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <div class="grid gap-2">
                        <Label for="phone">Телефон</Label>
                        <Input
                            id="phone"
                            v-model="form.phone"
                            type="text"
                            required
                            placeholder="+359 887 201 766"
                        />
                        <InputError :message="form.errors.phone" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="working_hours">Работно време</Label>
                        <textarea
                            id="working_hours"
                            v-model="form.working_hours"
                            rows="4"
                            class="flex w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            placeholder="Понеделник - Петък&#10;09:00 - 17:30"
                        ></textarea>
                        <InputError :message="form.errors.working_hours" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="address">Адрес</Label>
                        <textarea
                            id="address"
                            v-model="form.address"
                            rows="4"
                            required
                            class="flex w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            placeholder="гр. Добрич&#10;ул. Христо Смирненски 2&#10;ет. 3, офис 3"
                        ></textarea>
                        <InputError :message="form.errors.address" />
                    </div>
                </div>
            </div>

            <!-- Section Divider -->
            <div class="border-t border-sidebar-border/70 dark:border-sidebar-border pt-6 mt-6">
                <Heading
                    variant="small"
                    title="Интро"
                    description="Управление на съдържанието в началната (Hero) секция"
                    class="mb-6"
                />
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <!-- Left Column (Badge & Heading) -->
                <div class="space-y-6">
                    <div class="grid gap-2">
                        <Label for="intro_badge">Текст на значката (Badge)</Label>
                        <Input
                            id="intro_badge"
                            v-model="form.intro_badge"
                            type="text"
                            required
                            placeholder="● Надеждно счетоводно обслужване"
                        />
                        <InputError :message="form.errors.intro_badge" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="intro_heading">Заглавие (Heading)</Label>
                        <Input
                            id="intro_heading"
                            v-model="form.intro_heading"
                            type="text"
                            required
                            placeholder="Вашият надежден партньор в света на финансите"
                        />
                        <InputError :message="form.errors.intro_heading" />
                    </div>
                </div>

                <!-- Right Column (Description) -->
                <div class="space-y-6">
                    <div class="grid gap-2">
                        <Label for="intro_description">Описание (Description)</Label>
                        <textarea
                            id="intro_description"
                            v-model="form.intro_description"
                            rows="6"
                            required
                            class="flex w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            placeholder="Свежи Консулт ЕООД предоставя..."
                        ></textarea>
                        <InputError :message="form.errors.intro_description" />
                    </div>
                </div>
            </div>

            <!-- Section Divider -->
            <div class="border-t border-sidebar-border/70 dark:border-sidebar-border pt-6 mt-6">
                <Heading
                    variant="small"
                    title="За нас"
                    description="Управление на съдържанието и картите в секция 'За нас'"
                    class="mb-6"
                />
            </div>

            <div class="space-y-6">
                <div class="grid gap-2">
                    <Label for="about_heading">Заглавие (Heading)</Label>
                    <Input
                        id="about_heading"
                        v-model="form.about_heading"
                        type="text"
                        required
                        placeholder="Професионализъм, на който можете да разчитате"
                    />
                    <InputError :message="form.errors.about_heading" />
                </div>

                <div class="grid gap-2">
                    <Label for="about_description">Описание (Description)</Label>
                    <textarea
                        id="about_description"
                        v-model="form.about_description"
                        rows="6"
                        required
                        class="flex w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        placeholder="Свежи Консулт ЕООД е счетоводна кантора..."
                    ></textarea>
                    <InputError :message="form.errors.about_description" />
                </div>

                <!-- Cards 2x2 Grid -->
                <div>
                    <Label class="block mb-3">Карти с предимства</Label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Card 1 -->
                        <div class="p-4 border rounded-xl space-y-3 bg-muted/10 dark:bg-muted/5 border-sidebar-border">
                            <div class="font-semibold text-xs text-emerald-700">Предимство 1</div>
                            <div class="grid gap-1">
                                <Label for="about_card_1_emoji" class="text-2xs text-muted-foreground">Емоджи</Label>
                                <Input id="about_card_1_emoji" v-model="form.about_card_1_emoji" required class="h-8 py-1" />
                                <InputError :message="form.errors.about_card_1_emoji" />
                            </div>
                            <div class="grid gap-1">
                                <Label for="about_card_1_title" class="text-2xs text-muted-foreground">Заглавие</Label>
                                <Input id="about_card_1_title" v-model="form.about_card_1_title" required class="h-8 py-1" />
                                <InputError :message="form.errors.about_card_1_title" />
                            </div>
                            <div class="grid gap-1">
                                <Label for="about_card_1_text" class="text-2xs text-muted-foreground">Описание</Label>
                                <Input id="about_card_1_text" v-model="form.about_card_1_text" required class="h-8 py-1" />
                                <InputError :message="form.errors.about_card_1_text" />
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="p-4 border rounded-xl space-y-3 bg-muted/10 dark:bg-muted/5 border-sidebar-border">
                            <div class="font-semibold text-xs text-emerald-700">Предимство 2</div>
                            <div class="grid gap-1">
                                <Label for="about_card_2_emoji" class="text-2xs text-muted-foreground">Емоджи</Label>
                                <Input id="about_card_2_emoji" v-model="form.about_card_2_emoji" required class="h-8 py-1" />
                                <InputError :message="form.errors.about_card_2_emoji" />
                            </div>
                            <div class="grid gap-1">
                                <Label for="about_card_2_title" class="text-2xs text-muted-foreground">Заглавие</Label>
                                <Input id="about_card_2_title" v-model="form.about_card_2_title" required class="h-8 py-1" />
                                <InputError :message="form.errors.about_card_2_title" />
                            </div>
                            <div class="grid gap-1">
                                <Label for="about_card_2_text" class="text-2xs text-muted-foreground">Описание</Label>
                                <Input id="about_card_2_text" v-model="form.about_card_2_text" required class="h-8 py-1" />
                                <InputError :message="form.errors.about_card_2_text" />
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="p-4 border rounded-xl space-y-3 bg-muted/10 dark:bg-muted/5 border-sidebar-border">
                            <div class="font-semibold text-xs text-emerald-700">Предимство 3</div>
                            <div class="grid gap-1">
                                <Label for="about_card_3_emoji" class="text-2xs text-muted-foreground">Емоджи</Label>
                                <Input id="about_card_3_emoji" v-model="form.about_card_3_emoji" required class="h-8 py-1" />
                                <InputError :message="form.errors.about_card_3_emoji" />
                            </div>
                            <div class="grid gap-1">
                                <Label for="about_card_3_title" class="text-2xs text-muted-foreground">Заглавие</Label>
                                <Input id="about_card_3_title" v-model="form.about_card_3_title" required class="h-8 py-1" />
                                <InputError :message="form.errors.about_card_3_title" />
                            </div>
                            <div class="grid gap-1">
                                <Label for="about_card_3_text" class="text-2xs text-muted-foreground">Описание</Label>
                                <Input id="about_card_3_text" v-model="form.about_card_3_text" required class="h-8 py-1" />
                                <InputError :message="form.errors.about_card_3_text" />
                            </div>
                        </div>

                        <!-- Card 4 -->
                        <div class="p-4 border rounded-xl space-y-3 bg-muted/10 dark:bg-muted/5 border-sidebar-border">
                            <div class="font-semibold text-xs text-emerald-700">Предимство 4</div>
                            <div class="grid gap-1">
                                <Label for="about_card_4_emoji" class="text-2xs text-muted-foreground">Емоджи</Label>
                                <Input id="about_card_4_emoji" v-model="form.about_card_4_emoji" required class="h-8 py-1" />
                                <InputError :message="form.errors.about_card_4_emoji" />
                            </div>
                            <div class="grid gap-1">
                                <Label for="about_card_4_title" class="text-2xs text-muted-foreground">Заглавие</Label>
                                <Input id="about_card_4_title" v-model="form.about_card_4_title" required class="h-8 py-1" />
                                <InputError :message="form.errors.about_card_4_title" />
                            </div>
                            <div class="grid gap-1">
                                <Label for="about_card_4_text" class="text-2xs text-muted-foreground">Описание</Label>
                                <Input id="about_card_4_text" v-model="form.about_card_4_text" required class="h-8 py-1" />
                                <InputError :message="form.errors.about_card_4_text" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Section Divider -->
            <div class="border-t border-sidebar-border/70 dark:border-sidebar-border pt-6 mt-6">
                <Heading
                    variant="small"
                    title="Предимства"
                    description="Управление на съдържанието и картите в секция 'Нашите предимства'"
                    class="mb-6"
                />
            </div>

            <div class="space-y-6">
                <!-- Row 1: Badge + Heading -->
                <div class="grid gap-4 md:grid-cols-2">
                    <div class="grid gap-2">
                        <Label for="advantages_badge">Значка (Badge)</Label>
                        <Input
                            id="advantages_badge"
                            v-model="form.advantages_badge"
                            type="text"
                            required
                            placeholder="Нашите предимства"
                        />
                        <InputError :message="form.errors.advantages_badge" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="advantages_heading">Заглавие (Heading)</Label>
                        <Input
                            id="advantages_heading"
                            v-model="form.advantages_heading"
                            type="text"
                            required
                            placeholder="Защо клиентите избират Свежи Консулт"
                        />
                        <InputError :message="form.errors.advantages_heading" />
                    </div>
                </div>

                <!-- Row 2: Description (full width) -->
                <div class="grid gap-2">
                    <Label for="advantages_description">Описание (Description)</Label>
                    <textarea
                        id="advantages_description"
                        v-model="form.advantages_description"
                        rows="4"
                        required
                        class="flex w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        placeholder="Комбинираме професионални знания..."
                    ></textarea>
                    <InputError :message="form.errors.advantages_description" />
                </div>

                <!-- Row 3: Cards 2x2 Grid -->
                <div>
                    <Label class="block mb-3">Карти с предимства</Label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Card 1 -->
                        <div class="p-4 border rounded-xl space-y-3 bg-muted/10 dark:bg-muted/5 border-sidebar-border">
                            <div class="font-semibold text-xs text-emerald-700">Карта 1</div>
                            <div class="grid gap-1">
                                <Label for="advantages_card_1_emoji" class="text-2xs text-muted-foreground">Емоджи</Label>
                                <Input id="advantages_card_1_emoji" v-model="form.advantages_card_1_emoji" required class="h-8 py-1" />
                                <InputError :message="form.errors.advantages_card_1_emoji" />
                            </div>
                            <div class="grid gap-1">
                                <Label for="advantages_card_1_title" class="text-2xs text-muted-foreground">Заглавие</Label>
                                <Input id="advantages_card_1_title" v-model="form.advantages_card_1_title" required class="h-8 py-1" />
                                <InputError :message="form.errors.advantages_card_1_title" />
                            </div>
                            <div class="grid gap-1">
                                <Label for="advantages_card_1_text" class="text-2xs text-muted-foreground">Описание</Label>
                                <Input id="advantages_card_1_text" v-model="form.advantages_card_1_text" required class="h-8 py-1" />
                                <InputError :message="form.errors.advantages_card_1_text" />
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="p-4 border rounded-xl space-y-3 bg-muted/10 dark:bg-muted/5 border-sidebar-border">
                            <div class="font-semibold text-xs text-emerald-700">Карта 2</div>
                            <div class="grid gap-1">
                                <Label for="advantages_card_2_emoji" class="text-2xs text-muted-foreground">Емоджи</Label>
                                <Input id="advantages_card_2_emoji" v-model="form.advantages_card_2_emoji" required class="h-8 py-1" />
                                <InputError :message="form.errors.advantages_card_2_emoji" />
                            </div>
                            <div class="grid gap-1">
                                <Label for="advantages_card_2_title" class="text-2xs text-muted-foreground">Заглавие</Label>
                                <Input id="advantages_card_2_title" v-model="form.advantages_card_2_title" required class="h-8 py-1" />
                                <InputError :message="form.errors.advantages_card_2_title" />
                            </div>
                            <div class="grid gap-1">
                                <Label for="advantages_card_2_text" class="text-2xs text-muted-foreground">Описание</Label>
                                <Input id="advantages_card_2_text" v-model="form.advantages_card_2_text" required class="h-8 py-1" />
                                <InputError :message="form.errors.advantages_card_2_text" />
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="p-4 border rounded-xl space-y-3 bg-muted/10 dark:bg-muted/5 border-sidebar-border">
                            <div class="font-semibold text-xs text-emerald-700">Карта 3</div>
                            <div class="grid gap-1">
                                <Label for="advantages_card_3_emoji" class="text-2xs text-muted-foreground">Емоджи</Label>
                                <Input id="advantages_card_3_emoji" v-model="form.advantages_card_3_emoji" required class="h-8 py-1" />
                                <InputError :message="form.errors.advantages_card_3_emoji" />
                            </div>
                            <div class="grid gap-1">
                                <Label for="advantages_card_3_title" class="text-2xs text-muted-foreground">Заглавие</Label>
                                <Input id="advantages_card_3_title" v-model="form.advantages_card_3_title" required class="h-8 py-1" />
                                <InputError :message="form.errors.advantages_card_3_title" />
                            </div>
                            <div class="grid gap-1">
                                <Label for="advantages_card_3_text" class="text-2xs text-muted-foreground">Описание</Label>
                                <Input id="advantages_card_3_text" v-model="form.advantages_card_3_text" required class="h-8 py-1" />
                                <InputError :message="form.errors.advantages_card_3_text" />
                            </div>
                        </div>

                        <!-- Card 4 -->
                        <div class="p-4 border rounded-xl space-y-3 bg-muted/10 dark:bg-muted/5 border-sidebar-border">
                            <div class="font-semibold text-xs text-emerald-700">Карта 4</div>
                            <div class="grid gap-1">
                                <Label for="advantages_card_4_emoji" class="text-2xs text-muted-foreground">Емоджи</Label>
                                <Input id="advantages_card_4_emoji" v-model="form.advantages_card_4_emoji" required class="h-8 py-1" />
                                <InputError :message="form.errors.advantages_card_4_emoji" />
                            </div>
                            <div class="grid gap-1">
                                <Label for="advantages_card_4_title" class="text-2xs text-muted-foreground">Заглавие</Label>
                                <Input id="advantages_card_4_title" v-model="form.advantages_card_4_title" required class="h-8 py-1" />
                                <InputError :message="form.errors.advantages_card_4_title" />
                            </div>
                            <div class="grid gap-1">
                                <Label for="advantages_card_4_text" class="text-2xs text-muted-foreground">Описание</Label>
                                <Input id="advantages_card_4_text" v-model="form.advantages_card_4_text" required class="h-8 py-1" />
                                <InputError :message="form.errors.advantages_card_4_text" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Fields: 2 Rows inside Advantages Section -->
            <div class="mt-6">
                
                <!-- Row 1: Stat 1 & Stat 2 -->
                <div class="grid gap-6 md:grid-cols-2 mb-6">
                    <div class="p-4 border rounded-xl space-y-4 bg-muted/5 border-sidebar-border">
                        <div class="font-semibold text-xs text-emerald-700">Показател 1</div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="grid gap-1">
                                <Label for="stats_1_value">Стойност (Value)</Label>
                                <Input id="stats_1_value" v-model="form.stats_1_value" required />
                                <InputError :message="form.errors.stats_1_value" />
                            </div>
                            <div class="grid gap-1">
                                <Label for="stats_1_label">Етикет (Label)</Label>
                                <Input id="stats_1_label" v-model="form.stats_1_label" required />
                                <InputError :message="form.errors.stats_1_label" />
                            </div>
                        </div>
                    </div>

                    <div class="p-4 border rounded-xl space-y-4 bg-muted/5 border-sidebar-border">
                        <div class="font-semibold text-xs text-emerald-700">Показател 2</div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="grid gap-1">
                                <Label for="stats_2_value">Стойност (Value)</Label>
                                <Input id="stats_2_value" v-model="form.stats_2_value" required />
                                <InputError :message="form.errors.stats_2_value" />
                            </div>
                            <div class="grid gap-1">
                                <Label for="stats_2_label">Етикет (Label)</Label>
                                <Input id="stats_2_label" v-model="form.stats_2_label" required />
                                <InputError :message="form.errors.stats_2_label" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row 2: Stat 3 & Stat 4 -->
                <div class="grid gap-6 md:grid-cols-2 mb-6">
                    <div class="p-4 border rounded-xl space-y-4 bg-muted/5 border-sidebar-border">
                        <div class="font-semibold text-xs text-emerald-700">Показател 3</div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="grid gap-1">
                                <Label for="stats_3_value">Стойност (Value)</Label>
                                <Input id="stats_3_value" v-model="form.stats_3_value" required />
                                <InputError :message="form.errors.stats_3_value" />
                            </div>
                            <div class="grid gap-1">
                                <Label for="stats_3_label">Етикет (Label)</Label>
                                <Input id="stats_3_label" v-model="form.stats_3_label" required />
                                <InputError :message="form.errors.stats_3_label" />
                            </div>
                        </div>
                    </div>

                    <div class="p-4 border rounded-xl space-y-4 bg-muted/5 border-sidebar-border">
                        <div class="font-semibold text-xs text-emerald-700">Показател 4</div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="grid gap-1">
                                <Label for="stats_4_value">Стойност (Value)</Label>
                                <Input id="stats_4_value" v-model="form.stats_4_value" required />
                                <InputError :message="form.errors.stats_4_value" />
                            </div>
                            <div class="grid gap-1">
                                <Label for="stats_4_label">Етикет (Label)</Label>
                                <Input id="stats_4_label" v-model="form.stats_4_label" required />
                                <InputError :message="form.errors.stats_4_label" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Divider for Services -->
            <div class="border-t border-sidebar-border/70 dark:border-sidebar-border pt-6 mt-6">
                <Heading
                    variant="small"
                    title="Услуги"
                    description="Управление на заглавието, описанието и детайлите за отделните услуги"
                    class="mb-6"
                />
            </div>

            <!-- General Services Fields (Full width, single column) -->
            <div class="space-y-6 max-w-4xl">
                <div class="grid gap-2">
                    <Label for="services_heading">Заглавие на секцията (Heading)</Label>
                    <Input
                        id="services_heading"
                        v-model="form.services_heading"
                        type="text"
                        required
                        placeholder="Всичко необходимо за успешния Ви бизнес"
                    />
                    <InputError :message="form.errors.services_heading" />
                </div>

                <div class="grid gap-2">
                    <Label for="services_description">Описание на секцията (Description)</Label>
                    <textarea
                        id="services_description"
                        v-model="form.services_description"
                        rows="4"
                        required
                        class="flex w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        placeholder="Предлагаме пълно счетоводно обслужване..."
                    ></textarea>
                    <InputError :message="form.errors.services_description" />
                </div>
            </div>

            <!-- Service Cards List -->
            <div class="space-y-6 mt-6">
                <Label class="block font-medium">Списък с услуги</Label>
                
                <!-- Services 1 to 4: 2 columns -->
                <div class="grid gap-6 md:grid-cols-2">
                    <div v-for="i in [1, 2, 3, 4]" :key="i" class="p-4 border rounded-xl space-y-3 bg-muted/10 dark:bg-muted/5 border-sidebar-border">
                        <div class="font-semibold text-xs text-emerald-700">Услуга {{ i }}</div>
                        
                        <div class="grid grid-cols-3 gap-2">
                            <div class="grid gap-1 col-span-1">
                                <Label :for="'services_item_' + i + '_emoji'" class="text-2xs text-muted-foreground">Емоджи</Label>
                                <Input :id="'services_item_' + i + '_emoji'" v-model="formAny['services_item_' + i + '_emoji']" required class="h-8 py-1" />
                            </div>
                            <div class="grid gap-1 col-span-2">
                                <Label :for="'services_item_' + i + '_title'" class="text-2xs text-muted-foreground">Заглавие</Label>
                                <Input :id="'services_item_' + i + '_title'" v-model="formAny['services_item_' + i + '_title']" required class="h-8 py-1" />
                            </div>
                        </div>
                        
                        <div class="grid gap-1">
                            <Label :for="'services_item_' + i + '_description'" class="text-2xs text-muted-foreground">Кратко описание</Label>
                            <Input :id="'services_item_' + i + '_description'" v-model="formAny['services_item_' + i + '_description']" required class="h-8 py-1" />
                        </div>

                        <div class="grid gap-1">
                            <Label :for="'services_item_' + i + '_list'" class="text-2xs text-muted-foreground">Списък с подуслуги (всеки ред е нов елемент)</Label>
                            <textarea
                                :id="'services_item_' + i + '_list'"
                                v-model="formAny['services_item_' + i + '_list']"
                                rows="12"
                                required
                                class="flex w-full rounded-md border border-input bg-background px-3 py-2 text-xs ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                placeholder="Изготвяне на счетоводна политика&#10;Приемане, преглед и класифициране на документи"
                            ></textarea>
                        </div>
                    </div>
                </div>

                <!-- Service 5: Full width single column -->
                <div class="p-4 border rounded-xl space-y-3 bg-emerald-50/50 dark:bg-emerald-950/10 border-emerald-200/50 dark:border-emerald-900/30">
                    <div class="font-semibold text-xs text-emerald-800 dark:text-emerald-500">Услуга 5 (Други услуги - разширена ширина)</div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="md:col-span-1 space-y-3">
                            <div class="grid grid-cols-3 gap-2">
                                <div class="grid gap-1 col-span-1">
                                    <Label for="services_item_5_emoji" class="text-2xs text-muted-foreground">Емоджи</Label>
                                    <Input id="services_item_5_emoji" v-model="form.services_item_5_emoji" required class="h-8 py-1" />
                                </div>
                                <div class="grid gap-1 col-span-2">
                                    <Label for="services_item_5_title" class="text-2xs text-muted-foreground">Заглавие</Label>
                                    <Input id="services_item_5_title" v-model="form.services_item_5_title" required class="h-8 py-1" />
                                </div>
                            </div>
                            <div class="grid gap-1">
                                <Label for="services_item_5_description" class="text-2xs text-muted-foreground">Кратко описание</Label>
                                <Input id="services_item_5_description" v-model="form.services_item_5_description" required class="h-8 py-1" />
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <div class="grid gap-1">
                                <Label for="services_item_5_list" class="text-2xs text-muted-foreground">Списък с подуслуги (всеки ред е нов елемент)</Label>
                                <textarea
                                    id="services_item_5_list"
                                    v-model="form.services_item_5_list"
                                    rows="12"
                                    required
                                    class="flex w-full rounded-md border border-input bg-background px-3 py-2 text-xs ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                    placeholder="Регистрация на ЕООД и ООД&#10;Подготовка на документи за Търговски регистър"
                                ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Divider for Work Process -->
            <div class="border-t border-sidebar-border/70 dark:border-sidebar-border pt-6 mt-6">
                <Heading
                    variant="small"
                    title="Как работим"
                    description="Управление на заглавието, описанието и стъпките в секция 'Как работим'"
                    class="mb-6"
                />
            </div>

            <div class="space-y-6">
                <!-- Badge + Heading (1 row) -->
                <div class="grid gap-4 md:grid-cols-2">
                    <div class="grid gap-2">
                        <Label for="process_badge">Значка (Badge)</Label>
                        <Input
                            id="process_badge"
                            v-model="form.process_badge"
                            type="text"
                            required
                            placeholder="Как работим"
                        />
                        <InputError :message="form.errors.process_badge" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="process_heading">Заглавие (Heading)</Label>
                        <Input
                            id="process_heading"
                            v-model="form.process_heading"
                            type="text"
                            required
                            placeholder="Лесен процес. Ясен резултат."
                        />
                        <InputError :message="form.errors.process_heading" />
                    </div>
                </div>

                <!-- Description (Full width) -->
                <div class="grid gap-2">
                    <Label for="process_description">Описание (Description)</Label>
                    <textarea
                        id="process_description"
                        v-model="form.process_description"
                        rows="3"
                        required
                        class="flex w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        placeholder="Нашият подход е структуриран така..."
                    ></textarea>
                    <InputError :message="form.errors.process_description" />
                </div>

                <!-- 4 Process Steps -->
                <div>
                    <Label class="block mb-3">Стъпки от работния процес</Label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div v-for="step in [1, 2, 3, 4]" :key="step" class="p-4 border rounded-xl space-y-3 bg-muted/10 dark:bg-muted/5 border-sidebar-border">
                            <div class="font-semibold text-xs text-emerald-700">Стъпка 0{{ step }}</div>
                            <div class="grid gap-1">
                                <Label :for="'process_step_' + step + '_title'" class="text-2xs text-muted-foreground">Заглавие</Label>
                                <Input :id="'process_step_' + step + '_title'" v-model="formAny['process_step_' + step + '_title']" required class="h-8 py-1" />
                                <InputError :message="formAny.errors['process_step_' + step + '_title']" />
                            </div>
                            <div class="grid gap-1">
                                <Label :for="'process_step_' + step + '_description'" class="text-2xs text-muted-foreground">Описание</Label>
                                <textarea
                                    :id="'process_step_' + step + '_description'"
                                    v-model="formAny['process_step_' + step + '_description']"
                                    rows="3"
                                    required
                                    class="flex w-full rounded-md border border-input bg-background px-3 py-2 text-xs ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                ></textarea>
                                <InputError :message="formAny.errors['process_step_' + step + '_description']" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Divider for FAQ -->
            <div class="border-t border-sidebar-border/70 dark:border-sidebar-border pt-6 mt-6">
                <Heading
                    variant="small"
                    title="Често задавани въпроси (FAQ)"
                    description="Управление на заглавието, описанието и въпросите в секция 'Често задавани въпроси'"
                    class="mb-6"
                />
            </div>

            <div class="space-y-6">
                <!-- Heading & Description -->
                <div class="grid gap-4 md:grid-cols-2">
                    <div class="grid gap-2">
                        <Label for="faq_heading">Заглавие (Heading)</Label>
                        <Input
                            id="faq_heading"
                            v-model="form.faq_heading"
                            type="text"
                            required
                            placeholder="Често задавани въпроси"
                        />
                        <InputError :message="form.errors.faq_heading" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="faq_description">Подзаглавие (Description)</Label>
                        <Input
                            id="faq_description"
                            v-model="form.faq_description"
                            type="text"
                            required
                            placeholder="Отговори на най-често задаваните въпроси."
                        />
                        <InputError :message="form.errors.faq_description" />
                    </div>
                </div>

                <!-- Dynamic FAQ items -->
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <Label class="block font-medium">Списък с въпроси и отговори</Label>
                        <Button type="button" variant="outline" size="sm" @click="addFaqItem" class="text-xs gap-1">
                            + Добави нов въпрос
                        </Button>
                    </div>

                    <div v-if="form.faq_items.length === 0" class="p-6 text-center text-sm text-muted-foreground border border-dashed rounded-xl">
                        Няма добавени въпроси. Натиснете бутона "+ Добави нов въпрос", за да създадете първия.
                    </div>

                    <div v-for="(item, index) in form.faq_items" :key="index" class="p-4 border rounded-xl space-y-3 bg-muted/10 dark:bg-muted/5 border-sidebar-border relative">
                        <div class="flex items-center justify-between">
                            <span class="font-semibold text-xs text-emerald-700">Въпрос #{{ index + 1 }}</span>
                            <div class="flex items-center gap-1">
                                <Button
                                    type="button"
                                    variant="ghost"
                                    size="sm"
                                    class="h-7 px-2 text-xs"
                                    :disabled="index === 0"
                                    @click="moveFaqItem(index, 'up')"
                                    title="Премести нагоре"
                                >
                                    ↑ Нагоре
                                </Button>
                                <Button
                                    type="button"
                                    variant="ghost"
                                    size="sm"
                                    class="h-7 px-2 text-xs"
                                    :disabled="index === form.faq_items.length - 1"
                                    @click="moveFaqItem(index, 'down')"
                                    title="Премести надолу"
                                >
                                    ↓ Надолу
                                </Button>
                                <Button
                                    type="button"
                                    variant="destructive"
                                    size="sm"
                                    class="h-7 px-2 text-xs bg-red-600 hover:bg-red-700 text-white"
                                    @click="removeFaqItem(index)"
                                    title="Изтрий"
                                >
                                    Изтрий
                                </Button>
                            </div>
                        </div>

                        <div class="grid gap-1">
                            <Label :for="'faq_q_' + index" class="text-2xs text-muted-foreground">Въпрос</Label>
                            <Input :id="'faq_q_' + index" v-model="item.question" required class="h-9 py-1 text-sm font-medium" placeholder="Въведете въпрос..." />
                            <InputError :message="formAny.errors['faq_items.' + index + '.question']" />
                        </div>

                        <div class="grid gap-1">
                            <Label :for="'faq_a_' + index" class="text-2xs text-muted-foreground">Отговор</Label>
                            <textarea
                                :id="'faq_a_' + index"
                                v-model="item.answer"
                                rows="3"
                                required
                                class="flex w-full rounded-md border border-input bg-background px-3 py-2 text-xs ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                placeholder="Въведете отговор..."
                            ></textarea>
                            <InputError :message="formAny.errors['faq_items.' + index + '.answer']" />
                        </div>
                    </div>

                    <div v-if="form.faq_items.length > 0" class="pt-2">
                        <Button type="button" variant="outline" size="sm" @click="addFaqItem" class="w-full text-xs gap-1 py-2">
                            + Добави нов въпрос
                        </Button>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-sidebar-border/70 dark:border-sidebar-border">
                <Button type="submit" :disabled="form.processing">
                    <Spinner v-if="form.processing" />
                    Запази
                </Button>
                <p v-if="form.recentlySuccessful" class="text-sm text-green-600">Настройките са запазени.</p>
            </div>
        </form>

        <!-- Delete Confirmation Modal -->
        <Dialog v-model:open="isDeleteDialogOpen">
            <DialogContent class="sm:max-w-md">
                <DialogHeader class="space-y-2">
                    <DialogTitle>Потвърждение за изтриване</DialogTitle>
                    <DialogDescription>
                        Сигурни ли сте, че искате да изтриете този въпрос? Това действие ще го премахне от списъка.
                    </DialogDescription>
                </DialogHeader>
                <DialogFooter class="gap-2 sm:gap-2 pt-4">
                    <DialogClose as-child>
                        <Button type="button" variant="outline">
                            Отказ
                        </Button>
                    </DialogClose>
                    <Button
                        type="button"
                        variant="destructive"
                        class="bg-red-600 hover:bg-red-700 text-white"
                        @click="executeDeleteFaqItem"
                    >
                        Изтрий въпроса
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>
    </div>
</template>
