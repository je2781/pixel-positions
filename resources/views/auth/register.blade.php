<x-app-layout>
    <x-page-heading>Register</x-page-heading>
    <section class="flex items-center justify-center w-full">
        <x-forms.form method='POST' action='/register' class="md:w-[50%] w-full" enctype="multipart/form-data">
            <x-forms.input label="Full Name" name="name" placeholder="John Doe" />
            <x-forms.input label="Email" name="email" placeholder="test@test.com" />
            <x-forms.input label="Password" name="password" type='password' placeholder="*********" />
            <x-forms.input label="Confirm Password" name="password_confirmation" type='password'
                placeholder="*********" />
            <x-forms.divider/>
            <x-forms.input label="Employer Name" name="employer" placeholder="John Doe" />
            <x-forms.input label="Employer Logo" name="logo" type='file'/>
            <div class="flex flex-row items-center mt-10 gap-x-3 justify-center w-full">
                <x-forms.button type='button' :isText="true" href='/login'>Already have an account?</x-forms.button>
                <x-forms.button type='submit'>Create Account</x-forms.button>
            </div>
        </x-forms.form>
    </section>
</x-app-layout>