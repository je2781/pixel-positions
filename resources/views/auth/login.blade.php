<x-app-layout>
    <x-page-heading>Login</x-page-heading>
    <section class="flex items-center justify-center w-full">
        <x-forms.form method='POST' action='/login' class="md:w-[50%] w-full">
            <x-forms.input label="Email" name="email" placeholder='test@test.com'/>
            <x-forms.input label="Password" name="password" type='password' placeholder='********'/>
            <div class="flex flex-row items-center mt-10 gap-x-3 justify-center w-full">
                <x-forms.button type='button' :isText="true" href='/register'>Don&apos;t have an account?</x-forms.button>
                <x-forms.button type='submit'>Login</x-forms.button>
            </div>
        </x-forms.form>
    </section>
</x-app-layout>