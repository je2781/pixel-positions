<x-app-layout>
    <x-page-heading>New Job</x-page-heading>
    <section class="flex items-center justify-center w-full">
        <x-forms.form method='POST' action='/jobs' class="md:w-[50%] w-full">
            <x-forms.input label="Title" name='title' placeholder='CEO' />
            <x-forms.input label="Salary" name='salary' placeholder='90000' type='number' min='0' max='200000'
                step='2000' />
            <x-forms.input label="Location" name='location' placeholder='Winter Park, Florida' />

            <x-forms.select label='Schedule' name='schedule'>
                <option class="text-black" value="full_time">Full Time</option>
                <option class="text-black" value="part_time">Part Time</option>
            </x-forms.select>

            <x-forms.checkbox label="Feature (Costs Extra)" name='featured'/>
            <x-forms.input label="URL" name='url' placeholder='https://acme.com/jobs/ceo-wanted' />

            <x-forms.divider />

            <x-forms.input label="Tags (comma separated)" name='tags' placeholder='education, video, engineer' />

            <x-forms.button type='submit' class="w-full">Publish</x-forms.button>

        </x-forms.form>
    </section>
</x-app-layout>