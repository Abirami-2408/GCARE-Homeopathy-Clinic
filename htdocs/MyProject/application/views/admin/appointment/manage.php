<div class="container-fluid mt-4">
    <h3>Manage Appointments</h3>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Preferred Date</th>
                <th>Message</th>
                <th>Status</th>
                <th>Booked On</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appointments as $appt): ?>
            <tr>
                <td><?= html_escape($appt->name) ?></td>
                <td><?= html_escape($appt->phone) ?></td>
                <td><?= html_escape($appt->email) ?></td>
                <td><?= $appt->preferred_date ?></td>
                <td><?= html_escape($appt->message) ?></td>
                <td>
                    <span class="badge badge-<?= $appt->status === 'confirmed' ? 'success' : ($appt->status === 'cancelled' ? 'danger' : 'warning') ?>">
                        <?= ucfirst($appt->status) ?>
                    </span>
                </td>
                <td><?= $appt->created_at ?></td>
                <td>
                    <a href="<?= base_url('admin/update_appointment_status/'.$appt->id.'/confirmed') ?>" class="btn btn-sm btn-success">Confirm</a>
                    <a href="<?= base_url('admin/update_appointment_status/'.$appt->id.'/cancelled') ?>" class="btn btn-sm btn-warning">Cancel</a>
                    <a href="<?= base_url('admin/delete_appointment/'.$appt->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this appointment?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
