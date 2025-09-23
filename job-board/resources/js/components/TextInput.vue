<script setup>
import { ref } from 'vue';

defineProps({
  type: { type: String, default: 'text' },
  name: { type: String, required: true },
  placeholder: { type: String, default: '' },
  value: { type: String, default: '' },
  formRef: { type: String, default: '' },
});

const input = ref(null);
const form = ref(null);

function clearAndSubmit() {
  if (input.value) {
    input.value.value = '';
  }
  if (form.value) {
    form.value.submit();
  }
}
</script>

<template>
  <div class="relative">
    <template v-if="type !== 'textarea'">
      <template v-if="formRef">
        <button type="button"
          class="absolute top-0 right-0 flex h-full items-center pr-2"
          @click="clearAndSubmit">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="h-4 w-4 text-slate-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </template>

      <input :type="type"
             :placeholder="placeholder"
             :name="name"
             :value="value"
             :id="name"
             ref="input"
             class="w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2" />
    </template>

    <template v-else>
      <textarea :id="name" :name="name"
                ref="input"
                class="w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2">
        {{ value }}
      </textarea>
    </template>
  </div>
</template>
