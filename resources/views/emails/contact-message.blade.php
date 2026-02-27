<x-mail::message>
New message from your portfolio contact form.

**From:** {{ $data['name'] }} &lt;{{ $data['email'] }}&gt;

**Subject:** {{ $data['subject'] }}

**Message:**

{{ $data['message'] }}
</x-mail::message>
