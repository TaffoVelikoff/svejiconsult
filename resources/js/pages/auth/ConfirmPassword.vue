<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import PasswordInput from '@/components/PasswordInput.vue';
import { Button } from '@/components/ui/button';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import { confirm } from '@/routes/password';

defineOptions({
    layout: {
        title: 'Confirm password',
        description: 'This is a secure area of the application. Please confirm your password before continuing.',
    },
});
</script>

<template>
    <Head title="Confirm password" />

    <div class="space-y-6">
        <Form v-bind="confirm.store.form()" v-slot="{ errors, processing }">
            <div class="grid gap-2">
                <Label for="password">Password</Label>
                <PasswordInput
                    id="password"
                    name="password"
                    required
                    autofocus
                    autocomplete="current-password"
                    placeholder="Password"
                />
                <InputError :message="errors.password" />
            </div>

            <div class="my-6 flex items-center justify-start">
                <Button
                    class="w-full"
                    :disabled="processing"
                    data-test="confirm-password-button"
                >
                    <Spinner v-if="processing" />
                    Confirm password
                </Button>
            </div>
        </Form>
    </div>
</template>
