<x-mail::message>
# Request Form Submission

Hello,

You have received a new request form submission. Below are the details:

---

## **Name:**  
{{ $contactData['name'] }}

## **Email:**  
{{ $contactData['email'] }}

## **Message:**  
{{ $contactData['message'] }}

## **Contact:**  
{{ $contactData['contact'] }}

## **Contact Method:**  
{{ $contactData['contactMethod'] }}

## **Timeline:**  
{{ $contactData['date'] }}
---
### Thank you,  
**{{ config('app.name') }}**  
</x-mail::message>